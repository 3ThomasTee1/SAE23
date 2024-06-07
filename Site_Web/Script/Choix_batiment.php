<?php
include 'mysql.php';

// Récupération des bâtiments présents dans la base de données
$sql = "SELECT id_batiment, nom FROM Batiment";
$result = mysqli_query($id_bd, $sql);

if (!$result) {
    die("Erreur lors de la récupération des données : " . mysqli_error($id_bd));
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <title>Mesures</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- Pour bien gérer le RWD -->
  <meta name="author" content="Thomas Tresgots">
  <meta name="description" content="SAE 23 - Mesures">
  <meta name="keywords" content="Mesures">
  <link rel="stylesheet" type="text/css" href="../Styles/style_adaptatif.css" media="screen">
  <!-- Ce lien me permet de pouvoir utiliser des icônes, très utiles pour habiller le site. Ces icônes sont symbolisées pour la balise <i> !-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer"> 
</head>
<body>
<!-- Barre de navigation !-->
	<nav>
		<ul class="Liens">
			<li><a href="index.html"><i class="fa-solid fa-house"></i> Accueil</a></li>
			<li><a href="/Admin/login_form.php"> Administration</a></li>
			<li><a href="Gestion.html"> Gestion</a></li>
			<li><a href="Consultation.html"> Consultation</a></li>
			<li><a href="Gestion_projet.html"> Gestion_projet</a></li>
		</ul>
	</nav>
	<section class="accueil">
		<h1 id="Titre_accueil">Bienvenue !</h1>			
	</section>
	<section class="accueil">
		<h2>Vous voilà dans la page Choix batiments</h2>
	</section>
	<!-- Section des formulaires centraux -->
	   <section class="form-container">
        <form action="redirect.php" method="post">
            <h2>Formulaire 1</h2>
            <label for="batiment">Veuillez choisir le bâtiment qui vous intéresse : </label>
            <select name="batiment" id="batiment">
                <?php while ($batiment = mysqli_fetch_assoc($result)): ?>
                    <option value="<?php echo htmlspecialchars($batiment['id']); ?>">
                        <?php echo htmlspecialchars($batiment['nom']); ?>
                    </option>
                <?php endwhile; ?>
            </select>
            <p>
                <input class="bouton" type="submit" value="Valider" />
                <input class="bouton" type="reset" value="Annuler" />
            </p>
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
			<li><a href="Mentions_legales.html"> Mentions légales</a></li>
		</ul>  
  </footer>
</body>
</html>

<?php
// Libération du résultat et fermeture de la connexion
mysqli_free_result($result);
mysqli_close($id_bd);
?>
		
