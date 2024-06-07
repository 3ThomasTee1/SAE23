<!DOCTYPE html>
<html lang="fr">
	<head>
    	<meta charset="UTF-8" />
    	<title>Supprimer Salle</title>
	</head>
	<body>
		
	
    	<h1>Choisir un batiment à supprimmer :</h1>
    	
    	<form action="" method="post">
    		<fieldset>
    			<?php
			
					include("../Script/mysql.php");
					
					$requete_batiment="SELECT id_batiment, nom FROM `Batiment`";
					
					$resultat=mysqli_query($id_bd, $requete_batiment);
					
					while($ligne=mysqli_fetch_array($resultat)){
						
						extract($ligne);
						echo "<label for=".$id_batiment."> Batiment $id_batiment de nom $nom :</label>";
        				echo "<input type=\"radio\" id=".$id_batiment." name=\"type\" value=".$id_batiment." />";
        				echo "</br>";
					}
			
				?>
        	</fieldset>
        		<input type="submit" value="Suivant"/>
    	</form>
	</body>
	
</html>
