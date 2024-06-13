<?php
	//Session start
	session_start();
	include ('../mysql.php');

	//Recovering the building from the previous form
	$batiment=$_POST['batiment'];

	//Retrieve rooms of the building from the database
	$sql = "SELECT nom_salle FROM Salle WHERE id_batiment = '$batiment'";
	$result = mysqli_query($id_bd, $sql);

	if (!$result) {
		die("Erreur lors de la récupération des données : " . mysqli_error($id_bd));
	}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <title>Page bâtiment</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- Pour bien gérer le RWD -->
  <meta name="description" content="SAE 23">
  <link rel="stylesheet" type="text/css" href="../../Styles/style_adaptatif.css" media="screen">
</head>
<body>
<!-- Nav bar-->
	<nav>
		<ul class="Liens">
			<li><a href="../index.html"><i class="fa-solid fa-house"></i> Accueil</a></li>
			<li><a href="../Admin/login_form.php"> Administration</a></li>
			<li><a href="login_form.php"> Gestion</a></li>
			<li><a href="../consultation.php"> Consultation</a></li>
			<li><a href="../Gestion_projet.html"> Gestion_projet</a></li>
		</ul>
	</nav>
	<section class="accueil">
		<h2>Vous voilà dans la page Batiment <?php $id_batiment ?></h2>
	</section>
	<section class="form-container">
	
	<!-- Creation of a form for selecting rooms-->
	<form action="../Batiment/choix_plage.php" method="post">
		<h2>Formulaire 2</h2>
			<label for="salle">Veuillez choisir la salle qui vous intéresse : </label>
				<select name="salle" id="salle">
					<?php 
					
						//Creation of options to select rooms
						while ($ligne = mysqli_fetch_assoc($result)){
						 	extract($ligne);
							echo "<option value=".$nom_salle.">".$nom_salle."</option>";
						}
						
                	?>
				</select>
			<p>
				<input class="bouton" type="submit" value="Valider" />
				<input class="bouton" type="reset" value="Annuler" />
			</p>
	</form>
	
	
	</section>
	<!-- Aside block for validating web pages!-->
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
	<!-- Footer block for visiting the Blagnac IUT website, and also for sending me an e-mail!-->
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
	// Release the result and close the connection
	mysqli_free_result($result);
	mysqli_close($id_bd);
?>
