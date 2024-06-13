
<!DOCTYPE html>
<html lang="fr">
<head>
  <title>Consultation</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- Pour bien gérer le RWD -->
  <meta name="description" content="SAE 23">
	<link rel="stylesheet" type="text/css" href="../Styles/style_adaptatif.css" media="screen" />
</head>
<body>
<!-- Barre de navigation !-->
	<nav>
		<ul class="Liens">
			<li><a href="index.html"><i class="fa-solid fa-house"></i> Accueil</a></li>
			<li><a href="Admin/login_form.php"> Administration</a></li>
			<li><a href="Gestionnaire/login_form.php"> Gestion</a></li>
			<li><a href="consultation.php"> Consultation</a></li>
			<li><a href="Gestion_projet.html"> Gestion de projet</a></li>
		</ul>
	</nav>
	<!-- Désolé d'avoir utilisé un div, c'est le seul sur mon site web. C'était pour me permettre de mieux déplacer l'image.!-->
	<!--<div><img id="Image_accueil" src="Images/Moi.jpg" alt="Image d'accueil" title="Image d'accueil"></div>-->
	<!-- Première section de présentation !-->
	<section class="accueil">
		<h1 id="Titre_accueil">Bienvenue !</h1>			
	</section>
	<!-- Seconde section de présentation pour vous inciter à me découvrir !-->
	<section class="accueil">
		<?php
			// Inclure le fichier de connexion
			include('mysql.php');

			// Requête SQL pour récupérer les dernières mesures de chaque capteur
			$sql = "
				SELECT 
					Capteur.nom_capteur, 
					Capteur.unite, 
					Capteur.nom_salle,
					DATE_FORMAT(Mesure.date, '%d/%m/%Y') AS date, 
					Mesure.horaire, 
					Mesure.valeur
				FROM Capteur
				INNER JOIN Mesure 
				ON Capteur.nom_capteur = Mesure.nom_capteur
				WHERE CONCAT(Mesure.date, ' ', Mesure.horaire) = (
					SELECT MAX(CONCAT(date, ' ', horaire))
					FROM Mesure
					WHERE Capteur.nom_capteur = Mesure.nom_capteur
				)
				ORDER BY Mesure.date DESC, Mesure.horaire DESC
					
			";


			$resultat = mysqli_query($id_bd, $sql);
			
			
			echo "<table> 
						<tr><th>Salle</th><th>Capteur</th><th>Date et Heure</th><th>Valeur</th><th>Unité</th></tr>";

			while($ligne = mysqli_fetch_assoc($resultat)){
				extract($ligne);

				
				
				echo "<tr><td>$nom_salle</td><td>$nom_capteur</td><td>$date $horaire</td><td>$valeur</td><td>$unite</td></tr>";

			}
			echo "</table>";
			
		?>
	</section>
	<!-- Bloc aside permettant da valider les pages web!-->
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
			<li>2024</li>
		</ul>  
  </footer>
</body>
		
</html>













