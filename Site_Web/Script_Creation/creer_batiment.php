<!DOCTYPE html>
<head>
  <title>Choisir batiment</title>
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

    	<script>
       		function convertion_majuscules(input) {
           		input.value = input.value.toUpperCase();
       		}
    	</script>
	</body>
</html>
