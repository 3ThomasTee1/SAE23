<?php
	//This page displays the rooms belonging to the building with which the manager has authenticated. 
	//In "login.php" in folder Gestionnaire.


	//Session start
	session_start();
	include ('../mysql.php');

	//Recovering the building from the previous form
	$batiment=$_POST['batiment'];

	//Retrieve buildings from the database
	$sql = "SELECT nom_salle FROM Salle WHERE id_batiment = '$batiment'";
	$result = mysqli_query($id_bd, $sql);

	if (!$result) {
		die("Erreur lors de la récupération des données : ".mysqli_error($id_bd));
	}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <title>Page bâtiment</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1"> 
  <meta name="description" content="SAE 23">
  <link rel="stylesheet" type="text/css" href="../../Styles/style_adaptatif.css" media="screen">
</head>
<body>
	<!-- Nav bar -->
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
	<form action="../Batiment/choix_plage.php" method="post">
		<h2>Formulaire de choix de salle</h2>
			<label for="salle">Veuillez choisir la salle qui vous intéresse : </label>
				<select name="salle" id="salle">
					<?php 
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
	<!-- Bloc Footer permettant de visiter le site de l'IUT de Blagnac, et aussi permettant de m'envoyer un mail!-->
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
	//Release the result and close the connection
	mysqli_free_result($result);
	mysqli_close($id_bd);
?>
