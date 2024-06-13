<?php
	$salle=$_POST['salle'];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <title>Gestion administrateur bâtiment</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- Pour bien gérer le RWD -->
  <meta name="description" content="SAE 23">
	<link rel="stylesheet" type="text/css" href="../../Styles/style_adaptatif.css" media="screen" />
</head>
<body>
<!-- Barre de navigation !-->
	<nav>
		<ul class="Liens">
			<li><a href="../index.html"><i class="fa-solid fa-house"></i> Accueil</a></li>
			<li><a href="../Admin/login_form.php"> Administration</a></li>
			<li><a href="../Gestionnaire/login_form.php"> Gestion</a></li>
			<li><a href="../consultation.php"> Consultation</a></li>
			<li><a href="../Gestion_projet.html"> Gestion_projet</a></li>
		</ul>
	</nav>
	<section class="accueil">
		<h1 id="Titre_accueil">Choix de la plage de temps !</h1>			
	</section>
	<section class="form-container">
		<h1>Filtrer les données de la base de données</h1>
		<form action="afficher_salle.php" method="POST">
			<input type="hidden" name="salle" value="<?php echo $salle;?>">
		    <label for="plage_temps">Choisir une plage de temps :</label>
		    <select name="plage_temps" id="plage_temps">
		        <option value="1_heure">Dernière heure</option>
		        <option value="2_heures">2 dernières heures</option>
		        <option value="12_heures">12 dernières heures</option>
		        <option value="1_jour">Dernier jour</option>
		        <option value="2_jours">2 derniers jours</option>
		        <option value="1_semaine">Dernière semaine</option>
		        <option value="debut">Depuis le début</option>
		    </select>
		    <button type="submit">Afficher les données</button>
		</form>
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
