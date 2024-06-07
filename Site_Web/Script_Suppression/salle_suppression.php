<!DOCTYPE html>
<html lang="fr">
	<head>
    	<meta charset="UTF-8" />
    	<title>Supprimer Salle</title>
	</head>
	<body>
		
	
    	<h1>Choisir une salle à supprimmer :</h1>
    	
    	<form action="./suppression.php" method="post">
    		<fieldset>
    			<input type="hidden" name="table" value="Salle">
    			<input type="hidden" name="champ" value="nom_salle">
    			<?php
			
					include("../Script/mysql.php");
					
					$requete_salle="SELECT * FROM `Salle`";
					
					$resultat=mysqli_query($id_bd, $requete_salle);
					
					while($ligne=mysqli_fetch_array($resultat)){
						
						extract($ligne);
						echo "<label for=".$nom_salle."> Salle $nom_salle appartenant au bâtiment $id_batiment de type $type_salle et de capacité $capacite :</label>";
        				echo "<input type=\"radio\" id=".$nom_salle." name=\"element\" value=".$nom_salle." />";
        				echo "</br>";
					}
			
				?>
        	</fieldset>
        		<input type="submit" value="Suivant"/>
    	</form>
	</body>
	
</html>
