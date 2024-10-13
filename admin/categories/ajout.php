<?php
session_start();
// 1. Récupération des données du formulaire
$nom = $_POST['nom'];
$description = $_POST['description'];
$createur = $_SESSION['id'];
$date_creation = date("Y-m-d");

// 2. La chaîne de connexion
include "../../inc/functions.php";
$conn = connect();

// 3. Création de la requête et exécution
$requete = "INSERT INTO categories (nom, description, createur, date_creation) VALUES ('$nom', '$description', '$createur', '$date_creation')";
$resultat = $conn->query($requete);

if ($resultat) {
    header('location: liste.php');
    exit();
} else {
    echo "Erreur lors de l'exécution de la requête : " . $conn->error;
}
?>
