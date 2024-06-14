<!DOCTYPE html>
<html lang="fr">
<head>
  <title>Afficher salle</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="SAE 23">
	<link rel="stylesheet" type="text/css" href="../../Styles/style_adaptatif.css" media="screen" />
</head>
<body>
<!-- Barre de navigation !-->
	<nav>
		<ul class="Liens">
			<li><a href="../index.html"> Accueil</a></li>
			<li><a href="../Admin/login_form.php"> Administration</a></li>
			<li><a href="../Gestionnaire/login_form.php"> Gestion</a></li>
			<li><a href="../consultation.php"> Consultation</a></li>
			<li><a href="../Gestion_projet.html"> Gestion_projet</a></li>
		</ul>
	</nav>

	<?php
		//This script allows the user to display room values according to the time interval selected previously.
	
		//Include the database connection script.
		include('../mysql.php');
		
		//Retrieving form values using the POST method.
		$plage_temps=$_POST['plage_temps'];
		$salle=$_POST['salle'];
		
		//Construct the condition according to the selected time range.
		$condition="";
		$message="";
		switch ($plage_temps) {
    		case '1_heure':
        		$condition = "AND CONCAT(Mesure.date, ' ', Mesure.horaire) >= NOW() - INTERVAL 1 HOUR";
        		$message="la dernière heure.";
        		break;
    		case '2_heures':
        		$condition = "AND CONCAT(Mesure.date, ' ', Mesure.horaire) >= NOW() - INTERVAL 2 HOUR";
        		$message="les deux dernières heures.";
        		break;
    		case '12_heures':
        		$condition = "AND CONCAT(Mesure.date, ' ', Mesure.horaire) >= NOW() - INTERVAL 12 HOUR";
        		$message="les douze dernières heures.";
        		break;
    		case '1_jour':
        		$condition = "AND CONCAT(Mesure.date, ' ', Mesure.horaire) >= NOW() - INTERVAL 1 DAY";
        		$message="le dernier jour.";
        		break;
    		case '2_jours':
        		$condition = "AND CONCAT(Mesure.date, ' ', Mesure.horaire) >= NOW() - INTERVAL 2 DAY";
        		$message="les deux derniers jours";
        		break;
    		case '1_semaine':
        		$condition = "AND CONCAT(Mesure.date, ' ', Mesure.horaire) >= NOW() - INTERVAL 1 WEEK";
        		$message="la dernière semaine.";
        		break;
    		case 'debut':
    			$message="depuis le début.";
    			break;
    		default:
        		break;
		}
		
		
		//Request to retrieve the minimum, maximum and average values
		$requete_calculs = "SELECT 
								MIN(Mesure.valeur) AS minimum,
                          		MAX(Mesure.valeur) AS maximum,
                          		AVG(Mesure.valeur) AS moyenne
                   			FROM Mesure
                   			INNER JOIN Capteur ON Capteur.nom_capteur = Mesure.nom_capteur
                   			WHERE Capteur.nom_salle = '$salle' $condition";

		$resultat_calculs = mysqli_query($id_bd, $requete_calculs);
					
		if (!$resultat_calculs) {
    		echo "Erreur de la requête calculs";
    		exit;
		}
					
		//Extraction of min, max, average
		$donnees_calculs = mysqli_fetch_assoc($resultat_calculs);
		$minimum = $donnees_calculs['minimum'];
		$maximum = $donnees_calculs['maximum'];
		$moyenne = $donnees_calculs['moyenne'];
		$moyenne = number_format($moyenne, 2);
		

		//Request to retrieve the data.
		$requete_donnees = "SELECT 
						date_format(Mesure.date, '%d/%m/%Y') AS date, 
                   		Mesure.horaire, 
                   		Mesure.nom_capteur, 
                   		Mesure.valeur,
                   		Capteur.type_capteur,
                   		Capteur.unite 
            		FROM Mesure
            		INNER JOIN Capteur ON Capteur.nom_capteur = Mesure.nom_capteur
            		WHERE Capteur.nom_salle = '$salle' $condition";

		$resultat = mysqli_query($id_bd, $requete_donnees);
		
		if(!$resultat){
			 echo "Erreur de la requête données : " . mysqli_error($id_bd);
			 exit;
		}
		
		echo "<aside class=\"encadre\">
			<h3>Résultats pour $message dans la salle $salle <br></h3>
		    <p>
		        Minimum : $minimum<br>
		        Maximum : $maximum<br>
		        Moyenne : $moyenne
		    </p>
		</aside>";
		
		//Create table of values
		echo "<section>
				<table>
					<caption>Données mesurées</caption>
						<tr>
							<th>Capteur</th>
							<th>Date et Heure</th>
							<th>Type</th>
							<th>Valeur</th>
							<th>Unité</th>
						</tr>";
		while ($ligne = mysqli_fetch_assoc($resultat)){
		
			extract($ligne);
			echo "<tr><td>$nom_capteur</td><td>$date $horaire</td><td>$type_capteur</td><td>$valeur</td><td>$unite</td></tr>";
		}
		
		echo "</table>
		</section>";
		
		//Close connection
		mysqli_close($id_bd);
	?>
	<!-- Footer block for visiting the Blagnac IUT website!-->
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
