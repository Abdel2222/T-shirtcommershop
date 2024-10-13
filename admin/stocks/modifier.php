<?php
session_start();
// 1. Récupération des données du formulaire
$id = $_POST['idstock'];
$quantite = $_POST['quantite'];

// 2. La chaîne de connexion
include "../../inc/functions.php";
$conn = connect();

// 3. Création de la requête et exécution
$requete = "UPDATE stocks SET quantite = '$quantite' WHERE id = '$id'";
$resultat = $conn->query($requete);

if ($resultat) {
    header('location: liste.php');
    exit();
} else {
    echo "Erreur lors de l'exécution de la requête : " . $conn->error;
}
?>
