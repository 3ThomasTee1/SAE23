<?php 
	/*Database connection script*/
	
	$id_bd=mysqli_connect('localhost', 'b3t', 'passb3t', 'sae23')
	or die("Connexion à la base de données impossible");
	
	/*Character encoding management*/
	mysqli_query($id_bd, "SET NAMES 'utf8'");

?>
