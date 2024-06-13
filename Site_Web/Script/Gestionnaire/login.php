<?php
	session_start();
	$_SESSION["login"] = $_REQUEST["login"]; // Récupération du login
	$_SESSION["mdp"] = $_REQUEST["mdp"];     // Récupération du mot de passe
	$login_form = $_SESSION["login"];
	$mdp_form = $_SESSION["mdp"];
	$_SESSION["auth"] = FALSE;

	// Vérification si login et mot de passe sont fournis
	if (empty($login_form) || empty($mdp_form)) {
		header("Location: login_error.php");
		exit(); //Important pour arrêter l'exécution du script
	} 
	else {
		// Accès à la base de données
		include("../mysql.php");

		$authentifie = FALSE;
		$gestionaire = FALSE;
		$type_utilisateur = '';

		// Vérifier dans la table Administration
		$requete = "SELECT  `login` AS login_base,`mdp` AS mdp_base FROM `Administration`"; 
		$resultat = mysqli_query($id_bd, $requete);
		if ($resultat) {
			$ligne = mysqli_fetch_assoc($resultat);
			extract($ligne);
			
			if (($login_form == $login_base) && ($mdp_form == $mdp_base)) {
				$authentifie = TRUE;
				$type_utilisateur = 'administrateur';
			}
		}

		// Si non trouvé dans Administration, vérifier dans Batiment
		if (!$authentifie) {
			$requete = "SELECT `mdp` AS mdp_gestion, `login` AS login_gestion, `id_batiment` FROM `Batiment`"; 
			$resultat = mysqli_query($id_bd, $requete);
			if ($resultat) {
				while ($ligne = mysqli_fetch_assoc($resultat)) {
					extract($ligne);
					if (($login_form == $login_gestion) && ($mdp_form == $mdp_gestion)) {
						$authentifie = TRUE;
						$batiment = $id_batiment;
						$gestionaire = TRUE;
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
			} elseif ($gestionaire) {
				echo "<form id='gestion_form' action='GestionGestionnaire.php' method='post'>";
				echo "<input type='hidden' name='batiment' value='$batiment'>";
				echo "</form>";
				echo "<script type='text/javascript'>document.getElementById('gestion_form').submit();</script>";
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

