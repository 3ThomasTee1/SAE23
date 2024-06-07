<?php
	session_start();
	$_SESSION["login"] = $_REQUEST["login"]; // Récupération du login
	$_SESSION["mdp"] = $_REQUEST["mdp"];     // Récupération du mot de passe
	$login = $_SESSION["login"];
	$motdep = $_SESSION["mdp"];
	$_SESSION["auth"] = FALSE;

	// Vérification si login et mot de passe sont fournis
	if (empty($login) || empty($motdep)) {
		header("Location: login_error.php");
		exit(); // Important pour arrêter l'exécution du script
	} else {
		// Accès à la base de données
		include("mysql.php");

		$authentifie = FALSE;
		$type_utilisateur = '';

		// Vérifier dans la table Administration
		$requete = "SELECT `mdp` FROM `Administration` WHERE `login` = '$login'"; 
		$resultat = mysqli_query($id_bd, $requete);
		if ($resultat) {
			$ligne = mysqli_fetch_row($resultat);
			if ($ligne && $motdep == $ligne[0]) {
				$authentifie = TRUE;
				$type_utilisateur = 'administrateur';
			}
		}

		// Si non trouvé dans Administration, vérifier dans Batiment
		if (!$authentifie) {
			$requete = "SELECT `mdp`, `login` FROM `Batiment` WHERE `login` = '$login'"; //La récupération du login n'est pas obligatoire, juste au cas où.
			$resultat = mysqli_query($id_bd, $requete);
			if ($resultat) {
				$ligne = mysqli_fetch_row($resultat);
				if ($ligne && $motdep == $ligne[0]) {
					$authentifie = TRUE;
					if ($login == 'gestINFO') {
						$type_utilisateur = 'gestionnaire1';
					} elseif ($login == 'gestRT') {
						$type_utilisateur = 'gestionnaire2';
					} else {
						$type_utilisateur = 'gestionnaire';
					}
				}
			}
		}

		if ($authentifie) {
			$_SESSION["auth"] = TRUE;
			mysqli_close($id_bd);

			// Redirection basée sur le type d'utilisateur
			if ($type_utilisateur == 'administrateur') {
				echo "<script type='text/javascript'>document.location.replace('../Admin/GestionAdminBat.php');</script>";
			} elseif ($type_utilisateur == 'gestionnaire1') {
				echo "<script type='text/javascript'>document.location.replace('GestionGestionnaire1.php');</script>";
			} elseif ($type_utilisateur == 'gestionnaire2') {
				echo "<script type='text/javascript'>document.location.replace('GestionGestionnaire2.php');</script>";
			} else {
				// Si le type d'utilisateur n'est pas reconnu, erreur de connexion
				$_SESSION = array(); // Réinitialisation du tableau de session
				session_destroy();   // Destruction de la session
				unset($_SESSION);    // Destruction du tableau de session
				echo "<script type='text/javascript'>document.location.replace('login_error.php');</script>";
			}
		} else {
			$_SESSION = array(); // Réinitialisation du tableau de session
			session_destroy();   // Destruction de la session
			unset($_SESSION);    // Destruction du tableau de session
			mysqli_close($id_bd);
			echo "<script type='text/javascript'>document.location.replace('login_error.php');</script>";
		}
	}
?>
