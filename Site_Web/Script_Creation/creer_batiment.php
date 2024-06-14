<!DOCTYPE html>
<head>
  <title>Création bâtiment</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="SAE 23">
  <link rel="stylesheet" type="text/css" href="../Styles/style_adaptatif.css" media="screen">
</head>
	<body>
	<nav>
		<ul class="Liens">
			<li><a href="../Script/index.html"> Accueil</a></li>
			<li><a href="../Script/Admin/login_form.php"> Administration</a></li>
			<li><a href="../Script/Gestionnaire/login_form.php"> Gestion</a></li>
			<li><a href="../Script/consultation.php"> Consultation</a></li>
			<li><a href="../Script/Gestion_projet.html"> Gestion_projet</a></li>
		</ul>
	</nav>
	
    	<h1>Choisir un bâtiment:</h1>
    	<section class="accueil">
    	<!-- Form to select building aspects-->
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
	</section>
		<!-- Script to convert nom_batiment to upper case-->
    	<script>
       		function convertion_majuscules(input) {
           		input.value = input.value.toUpperCase();
       		}
    	</script>
	<footer>
		<ul>
			<li><a href="https://www.iut-blagnac.fr/" target="_blank"><strong>l'IUT de Blagnac</strong></a></li>
			<li>Département Réseaux et Télécommunications</li>
			<li>BUT1</li>
			<li>2024</li>
		</ul>  
  </footer>
	</body>
</html>
