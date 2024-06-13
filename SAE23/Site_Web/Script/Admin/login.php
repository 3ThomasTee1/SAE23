<?php
	session_start();
	$_SESSION["login"] = $_REQUEST["login"];
	$_SESSION["mdp"] = $_REQUEST["mdp"];     
	$login = $_SESSION["login"];
	$motdep = $_SESSION["mdp"];
	$_SESSION["auth"] = FALSE;

	//Check that login and password are supplied
	if(empty($login) || empty($motdep)) {
		header("Location:login_error.php");
	} else {
	
		//Inclusion of database connection file
		include("../mysql.php");

		//Request to retrieve the password associated with the login provided
		$requete = "SELECT `mdp` FROM `Administration` WHERE `login` = '$login'";
		$resultat = mysqli_query($id_bd, $requete)
			or die("Execution de la requete impossible : $requete");

		$ligne = mysqli_fetch_row($resultat);
		if ($ligne && $motdep == $ligne[0]) {
			$_SESSION["auth"] = TRUE;		
			mysqli_close($id_bd);
			echo "<script type='text/javascript'>document.location.replace('GestionAdmin.html');</script>";
		} else {
			$_SESSION = array(); 
			session_destroy();   //Delete session
			unset($_SESSION);    //Delete session table
			mysqli_close($id_bd); //Close connection
			echo "<script type='text/javascript'>document.location.replace('login_error.php');</script>";
		}
	}
?>
