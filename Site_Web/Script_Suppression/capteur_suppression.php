<!DOCTYPE html>
<html lang="fr">
<head>
  <title>Supprimer capteur</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- Pour bien gérer le RWD -->
  <meta name="author" content="Thomas Tresgots">
  <meta name="description" content="SAE 23 - Accueil">
  <meta name="keywords" content="Accueil">
  <link rel="stylesheet" type="text/css" href="../Styles/style_adaptatif.css" media="screen">
  <!-- Ce lien me permet de pouvoir utiliser des icônes, très utiles pour habiller le site. Ces icônes sont symbolisées pour la balise <i> !-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer"> 
</head>
	<body>
		
	
    	<h1>Choisir un capteur à supprimmer :</h1>
        <section class="accueil">
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
	</section>
	</body>
	
</html>
