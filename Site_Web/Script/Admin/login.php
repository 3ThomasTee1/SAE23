<?php
	session_start();
	$_SESSION["login"] = $_REQUEST["login"]; // Récupération du login
	$_SESSION["mdp"] = $_REQUEST["mdp"];     // Récupération du mot de passe
	$login = $_SESSION["login"];
	$motdep = $_SESSION["mdp"];
	$_SESSION["auth"] = FALSE;

	// Vérification si login et mot de passe sont fournis
	if(empty($login) || empty($motdep)) {
		header("Location:login_error.php");
	} else {
		// Accès à la base de données
		include("../mysql.php");

		// Requête pour récupérer le mot de passe associé au login fourni
		$requete = "SELECT `mdp` FROM `Administration` WHERE `login` = '$login'";
		$resultat = mysqli_query($id_bd, $requete)
			or die("Execution de la requete impossible : $requete");

		$ligne = mysqli_fetch_row($resultat);
		if ($ligne && $motdep == $ligne[0]) {
			$_SESSION["auth"] = TRUE;		
			mysqli_close($id_bd);
			echo "<script type='text/javascript'>document.location.replace('GestionAdmin.html');</script>";
		} else {
			$_SESSION = array(); // Réinitialisation du tableau de session
			session_destroy();   // Destruction de la session
			unset($_SESSION);    // Destruction du tableau de session
			mysqli_close($id_bd);
			echo "<script type='text/javascript'>document.location.replace('login_error.php');</script>";
		}
	}
?>
