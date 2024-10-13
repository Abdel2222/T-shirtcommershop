<?php
session_start();
$idvisiteur = $_GET['id'];
include "../../inc/functions.php";
$conn = connect();
$requete = "UPDATE visiteurs SET etat = 1 WHERE id = '$idvisiteur'";
$resultat = $conn->query($requete);
if ($resultat) {
    header('location: liste.php?valider=ok');
} else {
    echo "erreur valider";
}
?>
