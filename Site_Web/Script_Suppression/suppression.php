<!DOCTYPE html>
<html lang="fr">
<head>
  <title>Suppression</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- Pour bien gérer le RWD -->
  <meta name="author" content="Thomas Tresgots">
  <meta name="description" content="SAE 23 - Accueil">
  <meta name="keywords" content="Accueil">
  <link rel="stylesheet" type="text/css" href="../Styles/style_adaptatif.css" media="screen">
  <!-- Ce lien me permet de pouvoir utiliser des icônes, très utiles pour habiller le site. Ces icônes sont symbolisées pour la balise <i> !-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer"> 
</head>
	<nav>
		<ul class="Liens">
			<li><a href="../Script/index.html"><i class="fa-solid fa-house"></i> Accueil</a></li>
			<li><a href="../Script/Admin/login_form.php"> Administration</a></li>
			<li><a href="../Script/Gestionnaire/login_form.php"> Gestion</a></li>
			<li><a href="../Script/consultation.php"> Consultation</a></li>
			<li><a href="../Script/Gestion_projet.html"> Gestion_projet</a></li>
		</ul>
	</nav>
	<body>
		
	
    	<h1>Supression de l élément choisi :</h1>
    	<section class="accueil">
    			<?php
			
					include("../Script/mysql.php");
					
					$element=$_POST['element'];
					
					$table=$_POST['table'];
					
					$champ=$_POST['champ'];
					
					
					$requete="DELETE FROM `sae23`.`$table` WHERE `$table`.`$champ` = '$element'";
					
					// Exécuter les requêtes SQL
					if (mysqli_query($id_bd, $requete)) {
    					echo "L'élément $element à bien été supprimé.<br>";
					} else {
    					echo "Erreur lors de la suppression : " . mysqli_error($id_bd) . "<br>";
					}
			
				?>
	</section>
	</body>
	
</html>
