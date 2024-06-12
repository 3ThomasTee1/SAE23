<?php
	// Démarrage de la session
	session_start();
?>

<?php
// mysql.php

/* Script de connexion à la base de données */
$id_bd = mysqli_connect('localhost', 'b3t', 'passb3t', 'sae23')
or die("Connexion à la base de données impossible");

/* Gestion de l'encodage des caractères */
mysqli_query($id_bd, "SET NAMES 'utf8'");
?>


<!DOCTYPE html>
<html lang="fr">
<head>
  <title>Accueil</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- Pour bien gérer le RWD -->
  <meta name="author" content="Thomas Tresgots">
  <meta name="description" content="SAE 23 - Accueil">
  <meta name="keywords" content="Accueil">
  <link rel="stylesheet" type="text/css" href="../../Styles/style_adaptatif.css" media="screen">
  <!-- Ce lien me permet de pouvoir utiliser des icônes, très utiles pour habiller le site. Ces icônes sont symbolisées pour la balise <i> !-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer"> 
</head>
<body>
<!-- Barre de navigation !-->
	<nav>
		<ul class="Liens">
			<li><a href="../index.html"><i class="fa-solid fa-house"></i> Accueil</a></li>
			<li><a href="../Admin/login_form.php"> Administration</a></li>
			<li><a href="login_form.php"> Gestion</a></li>
			<li><a href="../Consultation.html"> Consultation</a></li>
			<li><a href="../Gestion_projet.html"> Gestion_projet</a></li>
		</ul>
	</nav>	
	</section>
	<section class="accueil">
		<h2>Vous voilà dans la page Batiment B</h2>
	</section>
	<section class="form-container">
	<form action="GestionGestionnaire1.php" method="post">
		<h2>Formulaire 2</h2>
			<label for="batiment">Veuillez choisir la salle qui vous intéresse : </label>
				<select name="batiment" id="batiment">
					<option value="Salle_B105">Salle B105</option>
					<option value="Salle_B205">Salle B205</option>
				</select>
			<p>
				<input class="bouton" type="submit" value="Valider" />
				<input class="bouton" type="reset" value="Annuler" />
			</p>
	</form>
  </section>

  <?php
	include 'mysql.php';

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$salle = $_POST['batiment'];

		// Requête SQL pour récupérer les capteurs associés à la salle sélectionnée
		$sql_capteurs = "SELECT nom_capteur FROM Capteur WHERE nom_salle = '$salle'";
		$result_capteurs = mysqli_query($id_bd, $sql_capteurs);

		if (!$result_capteurs) {
		    die("Erreur lors de la récupération des capteurs : " . mysqli_error($id_bd));
		}

		$capteurs = [];
		while ($row = mysqli_fetch_assoc($result_capteurs)) {
		    $capteurs[] = $row['nom_capteur'];
		}

		if (count($capteurs) > 0) {
		    // Convertir le tableau de capteurs en une chaîne pour l'utiliser dans la requête SQL
		    $capteurs_str = "'" . implode("','", $capteurs) . "'";
		    
		    // Requête SQL pour récupérer les mesures des capteurs associés à la salle sélectionnée
		    $sql_mesures = "SELECT date, horaire, valeur, nom_capteur FROM Mesure WHERE nom_capteur IN ($capteurs_str)";
		    $result_mesures = mysqli_query($id_bd, $sql_mesures);

		    if (!$result_mesures) {
		        die("Erreur lors de la récupération des mesures : " . mysqli_error($id_bd));
		    }

		    if (mysqli_num_rows($result_mesures) > 0) {
		        echo '
		        <section class="resultat">
		            <table>
		                <caption>Données mesurées</caption>
		                <tr>
		                    <th>Type</th>
		                    <th>Date</th>
		                    <th>Mesures</th>
		                </tr>';

		        while ($row = mysqli_fetch_assoc($result_mesures)) {
		            echo '
		            <tr>
		                <td>lux</td>
		                <td>' . htmlspecialchars($row['date']) . ' ' . htmlspecialchars($row['horaire']) . '</td>
		                <td>' . htmlspecialchars($row['valeur']) . '</td>
		            </tr>';
		        }

		        echo '
		            </table>
		        </section>';
		    } else {
		        echo '<p>Aucune donnée trouvée pour les capteurs de la salle sélectionnée.</p>';
		    }

		    // Libération du résultat des mesures
		    mysqli_free_result($result_mesures);
		} else {
		    echo '<p>Aucun capteur trouvé pour la salle sélectionnée.</p>';
		}

		// Libération du résultat des capteurs et fermeture de la connexion
		mysqli_free_result($result_capteurs);
		mysqli_close($id_bd);
	}
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
			<li><a href="../Mentions_legales.html"> Mentions légales</a></li>
		</ul>  
  </footer>
</body>
		
</html>
