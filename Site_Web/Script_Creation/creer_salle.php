<!DOCTYPE html>
<html lang="fr">
<head>
  <title>Choisir la salle</title>
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
    	<h1>Choisir la Salle</h1>
    	<?php
        	// Récupérer le bâtiment sélectionné
        	$batiment=$_POST['batiment'];
 			echo "Vous avez choisi le batiment $batiment";
	
        	// Définir les salles en fonction du bâtiment sélectionné
        	$salles=["B" => ["B105", "B203"],"E" => ["E105", "E208"]];
    	?>
	    <section class="accueil">
    	<form action="creer_capteur.php" method="post">
    		<fieldset>
    			<input type="hidden" name="batiment" value="<?php echo $_POST['batiment'];?>">
    			<input type="hidden" name="login" value="<?php echo $_POST['login'];?>">
    			<input type="hidden" name="mdp" value="<?php echo $_POST['mdp'];?>">
    			<input type="hidden" name="nom_batiment" value="<?php echo $_POST['nom_batiment'];?>">
        		<label for="salle">Quelle Salle:</label>
        		<select name="salle" id="salle">
            		<?php
                		foreach ($salles[$batiment] as $salle) {
                    		echo "<option value=\"$salle\">$salle</option>";
                		}
            		?>
        		</select>
        		<br/>
        		<label for="capacite_salle">Veuillez entrer la capacité de la salle</label>
        			<input type="number" name="capacite_salle" id="capacite_salle" min="0" max="999" required>
        		<br/>
        		<label for="type_salle"> Veuillez entrer le type de salle</label>
        			<select name="type_salle" id="type_salle">
        				<option value="TD">TD</option>
        				<option value="TP">TP</option>
        			</select>
        	</fieldset>
        		<input type="submit" value="Suivant">
    	</form>
	</section>
	</body>
</html>
