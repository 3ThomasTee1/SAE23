<!DOCTYPE html>
<html lang="fr">
<head>
  <title>Mesures</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- Pour bien gérer le RWD -->
  <meta name="author" content="Thomas Tresgots">
  <meta name="description" content="SAE 23 - Mesures">
  <meta name="keywords" content="Mesures">
  <link rel="stylesheet" type="text/css" href="../../Styles/style_adaptatif.css" media="screen">
  <!-- Ce lien me permet de pouvoir utiliser des icônes, très utiles pour habiller le site. Ces icônes sont symbolisées pour la balise <i> !-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer"> 
</head>
<body>
<!-- Barre de navigation !-->
	<nav>
		<ul class="Liens">
			<li><a href="../index.html"><i class="fa-solid fa-house"></i> Accueil</a></li>
			<li><a href="login_form.php"> Administration</a></li>
			<li><a href="../Gestionnaire/login_form.php"> Gestion</a></li>
			<li><a href="../Consultation.html"> Consultation</a></li>
			<li><a href="../Gestion_projet.html"> Gestion_projet</a></li>
		</ul>
	</nav>
	<?php
		//Inclusion du script de connexion à la base de données.
		include('../mysql.php');
		
		//Récupération des valeurs du formulaire par la méthode POST.
		$plage_temps=$_POST['plage_temps'];
		$salle=$_POST['salle'];
		
		//Construction de la condition en fonction de la plage de temps choisie.
		$condition="";
		$message="";
		switch ($plage_temps) {
    		case '1_heure':
        		$condition = "AND CONCAT(Mesure.date, ' ', Mesure.horaire) >= NOW() - INTERVAL 1 HOUR";
        		$message="la dernière heure";
        		break;
    		case '2_heures':
        		$condition = "AND CONCAT(Mesure.date, ' ', Mesure.horaire) >= NOW() - INTERVAL 2 HOUR";
        		$message="les deux dernières heures";
        		break;
    		case '12_heures':
        		$condition = "AND CONCAT(Mesure.date, ' ', Mesure.horaire) >= NOW() - INTERVAL 12 HOUR";
        		$message="les douze dernières heures";
        		break;
    		case '1_jour':
        		$condition = "AND CONCAT(Mesure.date, ' ', Mesure.horaire) >= NOW() - INTERVAL 1 DAY";
        		$message="le dernier jour";
        		break;
    		case '2_jours':
        		$condition = "AND CONCAT(Mesure.date, ' ', Mesure.horaire) >= NOW() - INTERVAL 2 DAY";
        		$message="les deux derniers jours";
        		break;
    		case '1_semaine':
        		$condition = "AND CONCAT(Mesure.date, ' ', Mesure.horaire) >= NOW() - INTERVAL 1 WEEK";
        		$message="la dernière semaine";
        		break;
    		case 'debut':
    			$message="depuis le début";
    			break;
    		default:
        		break;
		}
		
		
		//Requete pour récupérer le min, le max et la moyenne
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
					
		//Extraction du min, max, moyenne
		$donnees_calculs = mysqli_fetch_assoc($resultat_calculs);
		$minimum = $donnees_calculs['minimum'];
		$maximum = $donnees_calculs['maximum'];
		$moyenne = $donnees_calculs['moyenne'];
		$moyenne = number_format($moyenne, 2);
		

		//requête pour les données.
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
		
		//creation du tableau de valeurs
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
		
		
		mysqli_close($id_bd);
	?>
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
			<li><a href="../Mentions_legales.html"> Mentions légales</a></li>
		</ul>  
  </footer>
</body>
</html>
