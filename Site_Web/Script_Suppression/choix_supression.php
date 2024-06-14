<!DOCTYPE html>
<html lang="fr">
<head>
  <title>Choix bâtiment</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="SAE 23">
  <link rel="stylesheet" type="text/css" href="../Styles/style_adaptatif.css" media="screen">
</head>
	<body>
	
    	<h1>Choisir un élément à supprimmer :</h1>
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
	</body>
	
</html>
