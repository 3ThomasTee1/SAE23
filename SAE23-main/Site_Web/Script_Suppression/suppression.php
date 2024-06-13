<!DOCTYPE html>
<html lang="fr">
<head>
  <title>Suppression</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="SAE 23">
  <link rel="stylesheet" type="text/css" href="../Styles/style_adaptatif.css" media="screen">
</head>
	<nav>
		<ul class="Liens">
			<li><a href="../Script/index.html"> Accueil</a></li>
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
					//Include database connection file			
					include("../Script/mysql.php");

					//Recovering elements from previous forms					
					$element=$_POST['element'];
					
					$table=$_POST['table'];
					
					$champ=$_POST['champ'];
					
					//Request to remove chosen element					
					$requete="DELETE FROM `sae23`.`$table` WHERE `$table`.`$champ` = '$element'";
					
					if (mysqli_query($id_bd, $requete)) {
    					echo "L'élément $element à bien été supprimé.<br>";
					} else {
    					echo "Erreur lors de la suppression : " . mysqli_error($id_bd) . "<br>";
					}
					mysqli_close($id_bd);			
				?>
	</section>
	</body>
	
</html>
