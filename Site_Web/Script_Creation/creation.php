<!DOCTYPE html>
<html lang="fr">
<head>
  <title>Création</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="SAE 23">
  <link rel="stylesheet" type="text/css" href="../Styles/style_adaptatif.css" media="screen">
</head>
<body>
<!-- Barre de navigation !-->
	<nav>
		<ul class="Liens">
			<li><a href="../Script/index.html"> Accueil</a></li>
			<li><a href="../Script/Admin/login_form.php"> Administration</a></li>
			<li><a href="../Script/Gestionnaire/login_form.php"> Gestion</a></li>
			<li><a href="../Script/consultation.php"> Consultation</a></li>
			<li><a href="../Script/Gestion_projet.html"> Gestion_projet</a></li>
		</ul>
	</nav>
	<section class="accueil">
		   	<h1>Ajout :</h1>
    	
    			<?php
					//This script retrieves all the information entered in the previous forms in order to add the items to the database. 
			
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
					
					// Fermer la connexion à la base de données
					mysqli_close($id_bd);
			
				?>		
	</section>
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
		
	

