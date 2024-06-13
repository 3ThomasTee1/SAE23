<!DOCTYPE html>
<head>
  <title>Création bâtiment</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- Pour bien gérer le RWD -->
  <meta name="description" content="SAE 23">
  <link rel="stylesheet" type="text/css" href="../Styles/style_adaptatif.css" media="screen">
</head>
	<body>
	<nav>
		<ul class="Liens">
			<li><a href="../Script/index.html"><i class="fa-solid fa-house"></i> Accueil</a></li>
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
	<aside id="last">
		<hr>
			<p><em> Validation de la page HTML5 - CSS3 </em></p>
				<a href="https://validator.w3.org/nu/?doc=http%3A%2F%2Ftresgots.atwebpages.com%2FSAE_14%2Findex.html" target="_blank"> 
					<img class= "image-responsive" src="Images/html5-validator-badge-blue.png" alt="HTML5 Valide !">
				</a>
				<a href="http://jigsaw.w3.org/css-validator/validator?uri=http%3A%2F%2Ftresgots.atwebpages.com%2FSAE_14%2FStyle%2FStyle_adaptatif.css" target="_blank">
					<img class= "image-responsive" src="Images/css-validator-badge-blue.PNG" alt="CSS Valide !">
				</a>
	</aside>
	<!-- Footer block allowing you to visit the Blagnac IUT website, and also allowing you to send me an email!-->
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
