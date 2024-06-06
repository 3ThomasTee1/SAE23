<!DOCTYPE html>
<html lang="fr">
<head>
  <title>Accueil</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- Pour bien gérer le RWD -->
  <meta name="author" content="Thomas Tresgots">
  <meta name="description" content="SAE 23 - Accueil">
  <meta name="keywords" content="Accueil">
  <link rel="stylesheet" type="text/css" href="../Styles/style_adaptatif.css" media="screen">
  <!-- Ce lien me permet de pouvoir utiliser des icônes, très utiles pour habiller le site. Ces icônes sont symbolisées pour la balise <i> !-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer"> 
</head>
<body>
<!-- Barre de navigation !-->
	<nav>
		<ul class="Liens">
			<li><a href="index.html"><i class="fa-solid fa-house"></i> Accueil</a></li>
			<li><a href="Administration.html"> Administration</a></li>
			<li><a href="Gestion.html"> Gestion</a></li>
			<li><a href="Consultation.html"> Consultation</a></li>
			<li><a href="Gestion_projet.html"> Gestion_projet</a></li>
		</ul>
	</nav>
	<section class="accueil">
		<h1 id="Titre_accueil">Bienvenue !</h1>			
	</section>
	<!-- Seconde section de présentation pour vous inciter à me découvrir !-->
	<section class="accueil">
		<h2>Vous voilà dans la page Batiment B</h2>
	</section>
	<section class="accueil">
    <h1 id="Titre_accueil">Bienvenue dans le bâtiment B</h1>
  </section>

  <section class="form-container">
	<form action="batiment_B.php" method="post">
		<h2>Formulaire 2</h2>
			<label for="batiment">Veuillez choisir la salle qui vous intéresse : </label>
				<select name="batiment" id="batiment">
					<option value="Salle_B105">Salle B105</option>
					<option value="Salle_B205">Salle B205</option>
				</select>
			<label for="batiment">Ainsi que la mesure qui vous intéresse : </label>
				<select name="mesures" id="mesures">
					<option value="Luminosite">Luminosité</option>
					<option value="Co2">Co2</option>
				</select>
			<p>
				<input class="bouton" type="submit" value="Valider" />
				<input class="bouton" type="reset" value="Annuler" />
			</p>
	</form>
  </section>

  <?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $salle = $_POST['batiment'];

    // On vérifie quelle salle a été sélectionnée et on affiche le tableau correspondant
    if ($salle == 'Salle_B105' || $salle == 'Salle_B205') {
      echo '
      <section class="resultat">
        <caption>Données mesurées</caption>
        <table>
          <tr>
            <th>Type</th>
            <th>Date</th>
            <th>Mesures</th>
          </tr>
          <tr>
            <td>Type 1</td>
            <td>01/01/2023</td>
            <td>123</td>
          </tr>
          <tr>
            <td>Type 2</td>
            <td>02/02/2023</td>
            <td>456</td>
          </tr>
        </table>
      </section>
      ';
    }
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
			<li><a href="Mentions_legales.html"> Mentions légales</a></li>
		</ul>  
  </footer>
</body>
		
