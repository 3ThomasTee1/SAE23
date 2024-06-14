
<!DOCTYPE html>
<html lang="fr">
<head>
  <title>Consultation</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="SAE 23">
	<link rel="stylesheet" type="text/css" href="../Styles/style_adaptatif.css" media="screen" />
</head>
<body>
  <!-- Nav bar -->
	<nav>
		<ul class="Liens">
			<li><a href="index.html"> Accueil</a></li>
			<li><a href="Admin/login_form.php"> Administration</a></li>
			<li><a href="Gestionnaire/login_form.php"> Gestion</a></li>
			<li><a href="consultation.php"> Consultation</a></li>
			<li><a href="Gestion_projet.html"> Gestion de projet</a></li>
		</ul>
	</nav>
	<section class="accueil">
		<h1 id="Titre_accueil">Bienvenue !</h1>			
	</section>
	<section class="accueil">
		<?php
			//This script displays the latest measurements from each sensor
			//In database. 
			
      		// Database connection file
			include('mysql.php');

      		// SQL query to retrieve the latest measurements from each sensor
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

     		//Query execution
			$resultat = mysqli_query($id_bd, $sql);
			
			//Building of the table
			echo "<table> 
						<tr><th>Salle</th><th>Capteur</th><th>Date et Heure</th><th>Valeur</th><th>Unité</th></tr>";
			
			while($ligne = mysqli_fetch_assoc($resultat)){
				extract($ligne);

				
				
				echo "<tr><td>$nom_salle</td><td>$nom_capteur</td><td>$date $horaire</td><td>$valeur</td><td>$unite</td></tr>";

			}
			echo "</table>";
		      
			//Close connection
      		mysqli_close($id_bd);
		?>
	</section>
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

