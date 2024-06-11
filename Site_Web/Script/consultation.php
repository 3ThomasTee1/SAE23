<?php
// Inclure le fichier de connexion
include('Admin/mysql.php');

// Requête SQL pour récupérer les dernières mesures de chaque capteur
$sql = "
    SELECT c.nom_capteur, c.unite, m1.date, m1.horaire, m1.valeur
    FROM Capteur c
    JOIN Mesure m1 ON c.nom_capteur = m1.nom_capteur
    LEFT JOIN Mesure m2 ON c.nom_capteur = m2.nom_capteur AND (m1.date < m2.date OR (m1.date = m2.date AND m1.horaire < m2.horaire))
    WHERE m2.nom_capteur IS NULL
    ORDER BY c.nom_capteur
";

$result = mysqli_query($id_bd, $sql);

// Vérifier si des résultats ont été trouvés
if (mysqli_num_rows($result) > 0) {
    // Afficher les résultats sous forme de tableau HTML
    echo "<table border='1'>";
    echo "<tr><th>Nom Capteur</th><th>Unité</th><th>Date et Horaire</th><th>Valeur</th></tr>";

    while($row = mysqli_fetch_assoc($result)) {
        $dateHoraire = $row['date'] . ' ' . $row['horaire'];
        echo "<tr><td>" . $row['nom_capteur'] . "</td><td>" . $row['unite'] . "</td><td>" . $dateHoraire . "</td><td>" . $row['valeur'] . "</td></tr>";
    }

    echo "</table>";
} else {
    echo "Aucune mesure trouvée.";
}

// Fermer la connexion
mysqli_close($id_bd);
?>