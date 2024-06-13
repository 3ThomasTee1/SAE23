<!DOCTYPE html>
<html lang="fr">
<head>
  <title>Choix suppression</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- Pour bien gérer le RWD -->
  <meta name="description" content="SAE 23">
  <link rel="stylesheet" type="text/css" href="../Styles/style_adaptatif.css" media="screen">
</head>
	<nav>
		<ul class="Liens">
			<li><a href="../Script/index.html"><i class="fa-solid fa-house"></i> Accueil</a></li>
			<li><a href="../Script/Admin/login_form.php"> Administration</a></li>
			<li><a href="../Script/Gestionnaire/login_form.php"> Gestion</a></li>
			<li><a href="../Script/consultation.php"> Consultation</a></li>
			<li><a href="../Script/Gestion_projet.html"> Gestion_projet</a></li>
		</ul>
	</nav>
	<body>
	
    	<h1>Choisir un élément à supprimmer :</h1>
    	<section class="accueil">
    	
    	<!-- Form to select the type of element to remove-->
    	<form action="./redirection_suppression.php" method="post">
    		<fieldset>
    		<legend>Que souhaitez vous supprimer ?</legend>
        		<label for="Batiment">Bâtiment :</label>
        		<input type="radio" id="Batiment" name="type" value="Batiment" />
        		</br>
        		<label for="Salle">Salle :</label>
        		<input type="radio" id="Salle" name="type" value="Salle" />
        		</br>
        		<label for="Capteur">Capteur:</label>
        		<input type="radio" id="Capteur" name="type" value="Capteur" />
        	</fieldset>
        		<input type="submit" value="Suivant"/>
    	</form>
	</section>
	</body>
	
</html>
