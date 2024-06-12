<!DOCTYPE html>
<html lang="fr">
	<head>
    	<meta charset="UTF-8" />
    	<title>Choisir Bâtiment</title>
	</head>
	<body>
	
    	<h1>Choisir un bâtiment:</h1>
    	
    	<form action="creer_salle.php" method="post">
    		<fieldset>
        		<label for="batiment">Bâtiment :</label>
        		<select name="batiment" id="batiment" required>
            		<option value="B">B</option>
            		<option value="E">E</option>
        		</select>
        		<br/>
        		<label for="login">Veuillez entrer un identifiant</label>
        		<input type="text" id="login" name="login" maxlength="10" required>
        		<br/>
        		<label for="mdp">Veuillez entrer un mot de passe</label>
        		<input type="password" id="mdp" name="mdp" maxlength="10" required>
        		<br/>
        		<label for="nom_batiment">Veuillez entrer un nom pour le bâtiment</label>
        		<input type="text" id="nom_batiment" name="nom_batiment" maxlength="4" onblur="convertion_majuscules(this)" required>
        	</fieldset>
        		<input type="submit" value="Suivant"/>
    	</form>
    	<script>
       		function convertion_majuscules(input) {
           		input.value = input.value.toUpperCase();
       		}
    	</script>
	</body>
</html>
