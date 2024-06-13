<?php
	// Start session
	session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <title>Formulaire connexion gestionnaire</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1"> 
  <meta name="description" content="SAE 23">
  <link rel="stylesheet" type="text/css" href="../../Styles/style_adaptatif.css" media="screen">
</head>

	<!-- Nav bar -->
	<nav>
		<ul class="Liens">
			<li><a href="../index.html"><i class="fa-solid fa-house"></i> Accueil</a></li>
			<li><a href="../Admin/login_form.php"> Administration</a></li>
			<li><a href="login_form.php"> Gestion</a></li>
			<li><a href="../consultation.php"> Consultation</a></li>
			<li><a href="../Gestion_projet.html"> Gestion de projet</a></li>
		</ul>
	</nav>


	<body>	

	<main>
        <section class="login-container">
            <h2>Connexion gestionnaire</h2>
            
            <!-- Form for identification in the management section -->
            <form action="login.php" method="post" enctype="multipart/form-data">
                <label for="login">Nom d utilisateur</label>
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
		<!-- Footer block for visiting the Blagnac IUT website, and also for sending me an e-mail!-->
		<footer>
			<ul>
				<li><a href="https://www.iut-blagnac.fr/" target="_blank"><strong>l IUT de Blagnac</strong></a></li>
				<li>Département Réseaux et Télécommunications</li>
				<li>BUT1</li>
				<li>2024</li>
			</ul>  
  		</footer>
	</body>
</html>
