<!DOCTYPE html>
<html lang="fr">
	<head>
    	<meta charset="UTF-8" />
    	<title>Ajouter</title>
	</head>
	<body>
		
	
    	<h1>Ajout :</h1>
    	
    			<?php
			
					//Inclusion des fichiers contenant les accès à la base de données
					include('../Script/mysql.php');
					
					//Récupération des valeurs des divers formulaires
					$batiment=$_POST['batiment'];
					$nom_batiment=$_POST['nom_batiment'];
					$login=$_POST['login'];
					$mdp=$_POST['mdp'];
					
					$capteur=$_POST['capteur'];
					$salle=$_POST['salle'];	
					$type_salle=$_POST['type_salle'];
					$capacite_salle=$_POST['capacite_salle'];
					
						
					//Préparer les requêtes SQL
					$requete_batiment = "INSERT INTO `sae23`.`Batiment` (`id_batiment`, `nom`, `login`, `mdp`) 
                     VALUES ('$batiment', '$nom_batiment', '$login', '$mdp')
                     ON DUPLICATE KEY UPDATE nom='$nom_batiment', login='$login', mdp='$mdp'";

					// Requête pour Salle
					$requete_salle = "INSERT INTO `sae23`.`Salle` (`nom_salle`, `type_salle`, `capacite`, `id_batiment`) 
					VALUES ('$salle', '$type_salle', '$capacite_salle', '$batiment')
					ON DUPLICATE KEY UPDATE type_salle='$type_salle', capacite='$capacite_salle', id_batiment='$batiment'";


					// Requête pour Capteur
					$requete_capteur = "INSERT INTO `sae23`.`Capteur` (`nom_capteur`, `type_capteur`, `unite`, `nom_salle`) 
					VALUES ('$capteur', 'luminosité', 'lux', '$salle')
					ON DUPLICATE KEY UPDATE type_capteur='luminosité', unite='lux'";						

					
					// Exécuter les requêtes SQL
					if (mysqli_query($id_bd, $requete_batiment)) {
						echo "Bâtiment ajouté avec succès.<br>";
					} else {
						echo "Erreur lors de l'ajout du bâtiment : " . mysqli_error($id_bd) . "<br>";
					}
					
					if (mysqli_query($id_bd, $requete_salle)) {
						echo "Salle ajoutée avec succès.<br>";
					} else {
						echo "Erreur lors de l'ajout de la salle : " . mysqli_error($id_bd) . "<br>";
					}
					
					if (mysqli_query($id_bd, $requete_capteur)) {
						echo "Capteur ajouté avec succès.<br>";
					} else {
						echo "Erreur lors de l'ajout du capteur : " . mysqli_error($id_bd) . "<br>";
					}
					
					// Fermer la connexion à la base de données
					mysqli_close($id_bd);
			
				?>
	</body>
	
</html>
