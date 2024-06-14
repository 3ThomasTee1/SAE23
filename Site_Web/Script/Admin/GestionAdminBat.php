<?php
	// Session start
	session_start();

	//Inclusion of database connection file
	include('../mysql.php');

?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <title>Gestion administrateur bâtiment</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="SAE 23">
	<link rel="stylesheet" type="text/css" href="../../Styles/style_adaptatif.css" media="screen" />
</head>
<body>
	<!-- Nav bar -->
	<nav>
		<ul class="Liens">
			<li><a href="../index.html"><i class="fa-solid fa-house"></i> Accueil</a></li>
			<li><a href="login_form.php"> Administration</a></li>
			<li><a href="../Gestionnaire/login_form.php"> Gestion</a></li>
			<li><a href="../consultation.php"> Consultation</a></li>
			<li><a href="../Gestion_projet.html"> Gestion_projet</a></li>
		</ul>
	</nav>
	<section class="accueil">
		<h1 id="Titre_accueil">Bienvenue !</h1>			
	</section>
	<section class="accueil">
		<h2>Vous voilà dans la page Choix batiments</h2>
	</section>
	
		<!-- Central form section -->
	   <section class="form-container">

	   	<!-- Construction of the building selection form -->
       	<form action="../Gestionnaire/GestionGestionnaire.php" method="post">
            	<h2>Formulaire de choix de bâtiment.</h2>
            	<label for="batiment">Veuillez choisir le bâtiment qui vous intéresse : </label>
            	<select name="batiment" id="batiment">
                	<?php 
	
						//query to retrieve buildings in the database
						$sql = "SELECT id_batiment, nom FROM Batiment";
						$resultat = mysqli_query($id_bd, $sql);
	
						if (!$resultat) {
							die("Erreur lors de la récupération des données : " . mysqli_error($id_bd));
						}
	
						//Construction of selectable fields in the form
						while ($ligne= mysqli_fetch_assoc($resultat)){
							extract($ligne);						
	
							echo "<option value=".$id_batiment.">".$nom."</option>";
						}
                	?>
            	</select>
            	<p>
                	<input class="bouton" type="submit" value="Valider" />
                	<input class="bouton" type="reset" value="Annuler" />
            	</p>
        	</form>


      </section>
	<!-- Aside block to validate web pages!-->
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
	<!-- Footer block to visit the IUT de Blagnac website, and also to send me an e-mail!-->
	<footer>
		<ul>
			<li><a href="https://www.iut-blagnac.fr/" target="_blank"><strong>l IUT de Blagnac</strong></a></li>
			<li>Département Réseaux et Télécommunications</li>
			<li>BUT1</li>
			<li>2024</li>
		</ul>  
  </footer>
</body>
</html>

<?php
	//Release result and close connection
	mysqli_free_result($resultat);
	mysqli_close($id_bd);
?>
