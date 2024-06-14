<!-- This script redirects to the page corresponding to the deletion of the type chosen in previous form. --> 

<?php
	//Redirecton in function of the type chosen
	$type=$_POST['type'];
	
	
	switch($type){
	
	case "Batiment":
		header("Location: ./batiment_suppression.php");
		break;
	case "Salle":
		header("Location: ./salle_suppression.php");
		break;
	case "Capteur":
		header("Location: ./capteur_suppression.php");
		break;
	case "Mesure":
		header("Location: ./mesure_suppression.php");
		break;
	}	
	
 
?>
