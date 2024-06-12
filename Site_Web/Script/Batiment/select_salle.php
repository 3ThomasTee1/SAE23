<!-- select_salle.php -->
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['batiment'])) {
    $batiment = $_POST['batiment'];

    // Connexion à la base de données
    $conn = new mysqli('localhost', 'b3t', 'passb3t', 'sae23');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Préparation et exécution de la requête pour obtenir les salles du bâtiment sélectionné
    $stmt = $conn->prepare("SELECT * FROM salles WHERE nom_salle LIKE CSONCAT(?, '%')");
    $stmt->bind_param("s", $batiment);
    $stmt->execute();
    $result_salles = $stmt->get_result();

    if ($result_salles->num_rows > 0) {
        echo '<section class="form-container">';
        echo '<form action="redirect2.php" method="post">';
        echo '<h2>Choisissez une salle</h2>';
        echo '<label for="salle">Salle :</label>';
        echo '<select name="salle" id="salle">';
        while ($salle = mysqli_fetch_assoc($result_salles)) {
            echo '<option value="' . htmlspecialchars($salle['nom_salle']) . '">';
            echo htmlspecialchars($salle['nom_salle']);
            echo '</option>';
        }
        echo '</select>';
        echo '<p>';
        echo '<input class="bouton" type="submit" value="Valider" />';
        echo '<input class="bouton" type="reset" value="Annuler" />';
        echo '</p>';
        echo '</form>';
        echo '</section>';
    } else {
        echo 'Aucune salle trouvée pour ce bâtiment.';
    }

    $stmt->close();
    $conn->close();
} else {
    echo 'Aucun bâtiment sélectionné.';
}
?>

