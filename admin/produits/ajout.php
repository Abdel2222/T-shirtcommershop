<?php
session_start();
include "../../inc/functions.php";
$conn = connect();
$nom = $_POST['nom'];
$prix = $_POST['prix'];
$quantite = $_POST['quantite'];
$date_creation = date("Y-m-d");
$description = $_POST['description'];

// uploader image
$target_dir = "../../images/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);
if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
    $image = $_FILES["image"]["name"];
} else {
    echo "Sorry, there was an error uploading your file.";
}

$requete = "INSERT INTO produits (nom, description, prix, image, categorie, date_creation) VALUES ('$nom', '$description', '$prix', '$image', '$categorie', '$date')";

$resultat = $conn->query($requete);

if ($resultat) {
    $produit = $conn->lastInsertId();

    $requete2 = "INSERT INTO stocks (produit, quantite, createur, date_creation) VALUES ('$produit', '$quantite', '$createur', '$date_creation')";
    if ($conn->query($requete2)) {
        header('location: liste.php');
        exit();
    }
} else {
    echo "Erreur lors de l'exécution de la requête : " . $conn->error;
}
?>


