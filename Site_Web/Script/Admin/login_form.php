<?php
	//This page is used to get login and password from a form in management section in the website (erase, add).
	//Those informations are then sent to login.php in folder Admin.
	
	//Session Start
	session_start();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <title>formulaire connexion administrateur</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="SAE 23">
	<link rel="stylesheet" type="text/css" href="../../Styles/style_adaptatif.css" media="screen" />
</head>

	<nav>
		<ul class="Liens">
			<li><a href="../index.html"> Accueil</a></li>
			<li><a href="login_form.php"> Administration</a></li>
			<li><a href="../Gestionnaire/login_form.php"> Gestion</a></li>
			<li><a href="../consultation.php"> Consultation</a></li>
			<li><a href="../Gestion_projet.html"> Gestion de projet</a></li>
		</ul>
	</nav>


	<body>

	<main>
        <section class="login-container">
            <!-- Form used log in the administration console-->
            <h2>Connexion Administrateur</h2>
            <form action="login.php" method="post" enctype="multipart/form-data">

                <label for="login">Nom d'utilisateur</label>
                <input type="text" name="login" id="login" placeholder="Nom d'utilisateur" required>
                <label for="mdp">Mot de passe</label>
                <input type="password" name="mdp" id="mdp" placeholder="Mot de passe" required>

                <button type="submit">Connexion</button>
            </form>
        </section>
	</main>

		<!-- Footer block allowing you to visit the Blagnac IUT website!-->
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
