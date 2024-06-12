<!DOCTYPE html>
<html lang="fr">
	<head>
    	<meta charset="UTF-8" />
    	<title>Supprimer Salle</title>
	</head>
	<body>
		
	
    	<h1>Supression de l élément choisi :</h1>
    	
    			<?php
			
					include("../Script/mysql.php");
					
					$element=$_POST['element'];
					
					$table=$_POST['table'];
					
					$champ=$_POST['champ'];
					
					
					$requete="DELETE FROM `sae23`.`$table` WHERE `$table`.`$champ` = '$element'";
					
					// Exécuter les requêtes SQL
					if (mysqli_query($id_bd, $requete)) {
    					echo "L'élément $element à bien été supprimé.<br>";
					} else {
    					echo "Erreur lors de la suppression : " . mysqli_error($id_bd) . "<br>";
					}
			
				?>
	</body>
	
</html>
