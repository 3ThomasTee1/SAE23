<!DOCTYPE html>
<html lang="fr">
	<head>
    	<meta charset="UTF-8" />
    	<title>Choisir Bâtiment</title>
	</head>
	<body>
	
    	<h1>Choisir un élément à supprimmer :</h1>
    	
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
