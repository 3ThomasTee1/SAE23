<?php 
	/*Script de connection à la base de données*/
	
	$id_bd=mysqli_connect('localhost', 'b3t', 'passb3t', 'sae23')
	or die("Connexion à la base de données impossible");
	
	/*Gestion de l'encodage des caractères*/
	mysqli_query($id_bd, "SET NAMES 'utf8'");

?>
