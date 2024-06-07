<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $batiment = $_POST['batiment'];

    if ($batiment == 'B') {
        header('Location: ../Gestionnaire/GestionGestionnaire1.php');
        exit();
    } elseif ($batiment == 'E') {
        header('Location: ../Gestionnaire/GestionGestionnaire2.php');
        exit();
    } else {
        // Redirection par défaut au cas où la valeur est inattendue
        header('Location: ../index.html');
        exit();
    }
}
?>

