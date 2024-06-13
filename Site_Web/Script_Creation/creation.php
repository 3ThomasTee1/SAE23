<!DOCTYPE html>
<html lang="fr">
<head>
  <title>Création</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- Pour bien gérer le RWD -->
  <meta name="description" content="SAE 23">
  <link rel="stylesheet" type="text/css" href="../Styles/style_adaptatif.css" media="screen">
</head>
<body>
<!-- Barre de navigation !-->
	<nav>
		<ul class="Liens">
			<li><a href="../Script/index.html"><i class="fa-solid fa-house"></i> Accueil</a></li>
			<li><a href="../Script/Admin/login_form.php"> Administration</a></li>
			<li><a href="../Script/Gestionnaire/login_form.php"> Gestion</a></li>
			<li><a href="../Script/consultation.php"> Consultation</a></li>
			<li><a href="../Script/Gestion_projet.html"> Gestion_projet</a></li>
		</ul>
	</nav>
	<!-- Désolé d'avoir utilisé un div, c'est le seul sur mon site web. C'était pour me permettre de mieux déplacer l'image.!-->
	<!--<div><img id="Image_accueil" src="Images/Moi.jpg" alt="Image d'accueil" title="Image d'accueil"></div>-->
	<!-- Première section de présentation !-->
	<section class="accueil">
		   	<h1>Ajout :</h1>
    	
    			<?php
			
					//Inclusion of files containing database accesses
					include('../Script/mysql.php');
					
					//Recovering values from previous forms
					$batiment=$_POST['batiment'];
					$nom_batiment=$_POST['nom_batiment'];
					$login=$_POST['login'];
					$mdp=$_POST['mdp'];
					
					$capteur=$_POST['capteur'];
					$salle=$_POST['salle'];	
					$type_salle=$_POST['type_salle'];
					$capacite_salle=$_POST['capacite_salle'];
					
						
					//Preparing SQL queries
					$requete_batiment = "INSERT INTO `sae23`.`Batiment` (`id_batiment`, `nom`, `login`, `mdp`) 
                     VALUES ('$batiment', '$nom_batiment', '$login', '$mdp')
                     ON DUPLICATE KEY UPDATE nom='$nom_batiment', login='$login', mdp='$mdp'";

					// Room request
					$requete_salle = "INSERT INTO `sae23`.`Salle` (`nom_salle`, `type_salle`, `capacite`, `id_batiment`) 
					VALUES ('$salle', '$type_salle', '$capacite_salle', '$batiment')
					ON DUPLICATE KEY UPDATE type_salle='$type_salle', capacite='$capacite_salle', id_batiment='$batiment'";


					// Request for Sensor
					$requete_capteur = "INSERT INTO `sae23`.`Capteur` (`nom_capteur`, `type_capteur`, `unite`, `nom_salle`) 
					VALUES ('$capteur', 'luminosité', 'lux', '$salle')
					ON DUPLICATE KEY UPDATE type_capteur='luminosité', unite='lux'";						

					
					// Execute SQL queries
					if (mysqli_query($id_bd, $requete_batiment)) {
						echo "Bâtiment $nom_batiment ajouté avec succès.<br>";
					} else {
						echo "Erreur lors de l'ajout du bâtiment $nom_batiment : " . mysqli_error($id_bd) . "<br>";
					}
					
					if (mysqli_query($id_bd, $requete_salle)) {
						echo "Salle $salle ajoutée avec succès.<br>";
					} else {
						echo "Erreur lors de l'ajout de la salle $salle : " . mysqli_error($id_bd) . "<br>";
					}
					
					if (mysqli_query($id_bd, $requete_capteur)) {
						echo "Capteur $capteur ajouté avec succès.<br>";
					} else {
						echo "Erreur lors de l'ajout du capteur $capteur : " . mysqli_error($id_bd) . "<br>";
					}
					
					// Close the database connection
					mysqli_close($id_bd);
			
				?>		
	</section>

	<!-- Aside block for validating web pages!-->
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
		
	

