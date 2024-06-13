<!DOCTYPE html>
<html lang="fr">
<head>
  <title>Suppression salle</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="SAE 23">
  <link rel="stylesheet" type="text/css" href="../Styles/style_adaptatif.css" media="screen">
</head>
	<body>
		
	
    	<h1>Choisir une salle à supprimmer :</h1>
    	<section class="accueil">
    	<!-- Form to select the room to remove-->
    	<form action="./suppression.php" method="post">
    		<fieldset>
    			<input type="hidden" name="table" value="Salle">
    			<input type="hidden" name="champ" value="nom_salle">
    			<?php
					//Include database connection file			
					include("../Script/mysql.php");

					//Retrieve the sensors in the base					
					$requete_salle="SELECT * FROM `Salle`";					
					$resultat=mysqli_query($id_bd, $requete_salle);

					//Build options in the form					
					while($ligne=mysqli_fetch_array($resultat)){
						
						extract($ligne);
						echo "<label for=".$nom_salle."> Salle $nom_salle appartenant au bâtiment $id_batiment de type $type_salle et de capacité $capacite :</label>";
        				echo "<input type=\"radio\" id=".$nom_salle." name=\"element\" value=".$nom_salle." />";
        				echo "</br>";
					}
					mysqli_close($id_bd);			
				?>
        	</fieldset>
        		<input type="submit" value="Suivant"/>
    	</form>
	</section>
	</body>
	
</html>
