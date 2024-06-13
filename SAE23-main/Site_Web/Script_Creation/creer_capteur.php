<!DOCTYPE html>
<html lang="fr">
<head>
  <title>Création capteur</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="SAE 23">
  <link rel="stylesheet" type="text/css" href="../Styles/style_adaptatif.css" media="screen">
</head>
<body>
    <h1>Choisir le Capteur</h1>
    <?php
        //Recover selected room and building information
        $batiment=$_POST['batiment'];
		$nom_batiment=$_POST['nom_batiment'];
		$login=$_POST['login'];
		$mdp=$_POST['mdp'];
		$salle=$_POST['salle'];
		$type_salle=$_POST['type_salle'];
		$capacite_salle=$_POST['capacite_salle']; 

        
        
        
        echo "Vous avez choisi la salle $salle du batiment $batiment $type_salle, $capacite_salle, $login, $mdp, $nom_batiment";
        

        //Defining the sensors according to the room selected
        $capteurs = ["B105" => ["AM107-13"],"B203" => ["AM107-6"],"E105" => ["AM107-35"],"E208" => ["AM107-38"]];
    ?>
    <section class="accueil">
    <form action="creation.php" method="post">
    	<input type="hidden" name="batiment" value="<?php echo $_POST['batiment'];?>">
    	<input type="hidden" name="salle" value="<?php echo $_POST['salle'];?>">
    	<input type="hidden" name="type_salle" value="<?php echo $_POST['type_salle'];?>">
		<input type="hidden" name="capacite_salle" value="<?php echo $_POST['capacite_salle'];?>">
		<input type="hidden" name="login" value="<?php echo $_POST['login'];?>">
    	<input type="hidden" name="mdp" value="<?php echo $_POST['mdp'];?>">
    	<input type="hidden" name="nom_batiment" value="<?php echo $_POST['nom_batiment'];?>">
        <label for="capteur">Quel Capteur:</label>
        <select name="capteur" id="capteur">
            <?php
                foreach ($capteurs[$salle] as $capteur) {
                    echo "<option value=\"$capteur\">$capteur</option>";
                }
            ?>
        </select>
        <input type="submit" value="Envoyer">
    </form>
	</section>

</body>
</html>
