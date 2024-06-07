<!DOCTYPE html>
<html lang="fr">
	<head>
    	<meta charset="UTF-8" />
    	<title>Supprimer Capteur</title>
	</head>
	<body>
		
	
    	<h1>Choisir un capteur à supprimmer :</h1>
    	
    	<form action="./suppression.php" method="post">
    		<fieldset>
    			<input type="hidden" name="table" value="Capteur">
    			<input type="hidden" name="champ" value="nom_capteur">
    			<?php
			
					include("../Script/mysql.php");
					
					$requete_capteur="SELECT nom_capteur, type_capteur, nom_salle FROM `Capteur`";
					
					$resultat=mysqli_query($id_bd, $requete_capteur);
					
					while($ligne=mysqli_fetch_array($resultat)){
						
						extract($ligne);
						echo "<label for=".$nom_capteur."> Capteur $nom_capteur de type $type_capteur appartenant à la salle $nom_salle :</label>";
        				echo "<input type=\"radio\" id=".$nom_capteur." name=\"element\" value=".$nom_capteur." />";
        				echo "</br>";
					}
			
				?>
        	</fieldset>
        		<input type="submit" value="Suivant"/>
    	</form>
	</body>
	
</html>
