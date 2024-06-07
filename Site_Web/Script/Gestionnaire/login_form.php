<?php
	// Démarrage de la session
	session_start();
?>

<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8" />
		<title>Administration</title>
		<link rel="stylesheet" type="text/css" href="../../Styles/style_adaptatif.css"/>
	</head>

	<nav>
		<ul class="Liens">
			<li><a href="../index.html"><i class="fa-solid fa-house"></i> Accueil</a></li>
			<li><a href="../Admin/login_form.php"> Administration</a></li>
			<li><a href="login_form.php"> Gestion</a></li>
			<li><a href="../Consultation.html"> Consultation</a></li>
			<li><a href="../Gestion_projet.html"> Gestion_projet</a></li>
		</ul>
	</nav>


	<body>	

	<main>
        <section class="login-container">

            <h2>Connexion gestionnaire</h2>
            <form action="login.php" method="post" enctype="multipart/form-data">

                <label for="login">Nom d'utilisateur</label>
                <input type="text" name="login" id="login" placeholder="Nom d'utilisateur" required>
                <label for="mdp">Mot de passe</label>
                <input type="password" name="mdp" id="mdp" placeholder="Mot de passe" required>

                <button type="submit">Connexion</button>
            </form>
        </section>
	</main>

	
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
	<!-- Bloc Footer permettant de visiter le site de l'IUT de Blagnac, et aussi permettant de m'envoyer un mail!-->
		<footer>
			<ul>
				<li><a href="https://www.iut-blagnac.fr/" target="_blank"><strong>l'IUT de Blagnac</strong></a></li>
				<li>Département Réseaux et Télécommunications</li>
				<li>BUT1</li>
				<li><a href="../Mentions_legales.html"> Mentions légales</a></li>
			</ul>  
  		</footer>
	</body>
</html>
