<?php
	
	//session start
	session_start();
	$_SESSION["login"] = $_REQUEST["login"]; 
	$_SESSION["mdp"] = $_REQUEST["mdp"];     
	$login_form = $_SESSION["login"];
	$mdp_form = $_SESSION["mdp"];
	$_SESSION["auth"] = FALSE;

	// Check that login and password are supplied
	if (empty($login_form) || empty($mdp_form)) {
		header("Location: login_error.php");

	} 
	else {
		//Database access
		include("../mysql.php");

		$authentifie = FALSE;
		$gestionaire = FALSE;
		$type_utilisateur = '';

		//Check that the person who logged in is the administrator
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

		//If it's not an administrator, then check if it's a manager
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

			//Redirection based on user type
			
			//If it's the administrator
			if ($type_utilisateur == 'administrateur') {
				echo "<script type='text/javascript'>document.location.replace('../Admin/GestionAdminBat.php');</script>";
			
			//If it's a manager
			} elseif ($gestionaire) {
				echo "<form id='gestion_form' action='GestionGestionnaire.php' method='post'>";
				echo "<input type='hidden' name='batiment' value='$batiment'>";
				echo "</form>";
				echo "<script type='text/javascript'>document.getElementById('gestion_form').submit();</script>";
			} else {
				//If the user type is not recognised, connection error
				$_SESSION = array(); // Resetting the session table
				session_destroy();   // Delete session
				unset($_SESSION);    // Delete session table
				//Redirect to an error page
				echo "<script type='text/javascript'>document.location.replace('login_error.php');</script>";
			}
		} else {
			$_SESSION = array(); // Resetting the session table
			session_destroy();   // Delete session
			unset($_SESSION);    // Delete session table
			mysqli_close($id_bd);
			//Redirect to an error page
			echo "<script type='text/javascript'>document.location.replace('login_error.php');</script>";
		}
	}
?>

