<?php

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
