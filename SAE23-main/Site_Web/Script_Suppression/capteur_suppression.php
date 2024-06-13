<!DOCTYPE html>
<html lang="fr">
<head>
  <title>Suppression capteur</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="SAE 23">
  <link rel="stylesheet" type="text/css" href="../Styles/style_adaptatif.css" media="screen">
</head>
	<body>
		
	
    	<h1>Choisir un capteur à supprimmer :</h1>
        <section class="accueil">
        <!-- Form to select the sensor to remove-->
    	<form action="./suppression.php" method="post">
    		<fieldset>
    			<input type="hidden" name="table" value="Capteur">
    			<input type="hidden" name="champ" value="nom_capteur">
    			<?php
					//Include database connection file			
					include("../Script/mysql.php");
					
					//Retrieve the sensors in the base
					$requete_capteur="SELECT nom_capteur, type_capteur, nom_salle FROM `Capteur`";					
					$resultat=mysqli_query($id_bd, $requete_capteur);
					
					//Build options in the form
					while($ligne=mysqli_fetch_array($resultat)){
						
						extract($ligne);
						echo "<label for=".$nom_capteur."> Capteur $nom_capteur de type $type_capteur appartenant à la salle $nom_salle :</label>";
        				echo "<input type=\"radio\" id=".$nom_capteur." name=\"element\" value=".$nom_capteur." />";
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
