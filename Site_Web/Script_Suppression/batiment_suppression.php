<!-- This page allows you to choose more precisely the building to be deleted  -->

<!DOCTYPE html>
<head>
  <title>Suppression bâtiment</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="SAE 23">
  <link rel="stylesheet" type="text/css" href="../Styles/style_adaptatif.css" media="screen">
</head>
	<body>
		
    	<h1>Choisir un batiment à supprimmer :</h1>
       	<section class="accueil">
       	<!-- Form to select the building to remove-->
    	<form action="./suppression.php" method="post">
    		<fieldset>
    			<input type="hidden" name="table" value="Batiment">
    			<input type="hidden" name="champ" value="id_batiment">
    			<?php
					//Include database connection file
					include("../Script/mysql.php");

					//Retrieve the buildings in the base					
					$requete_batiment="SELECT id_batiment, nom FROM `Batiment`";
					$resultat=mysqli_query($id_bd, $requete_batiment);

					//Build options in the form					
					while($ligne=mysqli_fetch_array($resultat)){
						
						extract($ligne);
						echo "<label for=".$id_batiment."> Batiment $id_batiment de nom $nom :</label>";
        				echo "<input type=\"radio\" id=".$id_batiment." name=\"element\" value=".$id_batiment." />";
        				echo "</br>";
					}
					mysqli_close($id_bd);			
				?>
        	</fieldset>
        		<input type="submit" value="Suivant"/>
    	</form>
	</section>
	</body>
	
</html>
