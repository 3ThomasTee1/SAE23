<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $salle = $_POST['salle'];

    if ($salle == 'E105') {
        header('Location: salle_E105.php');
        exit();
    } elseif ($salle == 'E208') {
        header('Location: salle_E208.php');
        exit();
    } elseif ($salle == 'B105') {
        header('Location: salle_B105.php');
        exit();
	} elseif ($salle == 'B203') {
        header('Location: salle_B203.php');
        exit();
    } else {
        // Redirection par défaut au cas où la valeur est inattendue
        header('Location: ../index.html');
        exit();
    }
}
?>
