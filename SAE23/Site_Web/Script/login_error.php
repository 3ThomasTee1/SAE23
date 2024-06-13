<?php
	//Session start
	session_start();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <title>login error</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- Pour bien gérer le RWD -->
  <meta name="description" content="SAE 23">
	<link rel="stylesheet" type="text/css" href="../Styles/style_adaptatif.css" media="screen" />
</head>

<body>

	 <nav>
		<ul class="Liens">
			<li><a href="index.html"><i class="fa-solid fa-house"></i> Accueil</a></li>
			<li><a href="Admin/login_form.php"> Administration</a></li>
			<li><a href="../Gestionnaire/login_form.php"> Gestion</a></li>
			<li><a href="Consultation.php"> Consultation</a></li>
			<li><a href="Gestion de projet.html"> Gestion de projet</a></li>
		</ul>
	</nav>



	<body>
		<!-- Header display -->
		<?php 
			$_SESSION = array(); // Resetting the session table
			session_destroy();   // Delete session
			unset($_SESSION);    // Delete session table
		?>
		<section>
			<p>
				<br />
				<em><strong>Administration de la base : Acc&egrave;s limit&eacute; aux personnes autoris&eacute;es</strong></em>
				<br />
			</p>
			<br />
			<p class="erreur">Mot de passe non saisi ou erron&eacute; !!!</p>
			<br />
			<hr />
		</section>

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
				<li> 2024 </li>
			</ul>  
  		</footer>
	</body>
	
</html>
