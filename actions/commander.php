<?php
session_start();

if (!isset($_SESSION['nom'])) {
    header("location: ../connexion.php");
    exit();
}

$id_produit = $_POST['produit'];
$quantite = $_POST['quantite'];
$visiteur = $_SESSION['id'];

include "../inc/functions.php";
$conn = connect();

// Récupérer le prix du produit
$requete = "SELECT prix FROM produits WHERE id = :id_produit";
$stmt = $conn->prepare($requete);
$stmt->bindParam(':id_produit', $id_produit, PDO::PARAM_INT);
$stmt->execute();
$produit = $stmt->fetch();

// Convertir le prix et la quantité en nombres avant la multiplication
$prix = (float)$produit['prix'];
$quantite = (int)$quantite;
$total = $quantite * $prix;

$date = date("Y-m-d");

// Insérer dans le panier
$requete_panier = "INSERT INTO paniers (visiteur, total, date_creation) VALUES (:visiteur, :total, :date_creation)";
$stmt_panier = $conn->prepare($requete_panier);
$stmt_panier->bindParam(':visiteur', $visiteur, PDO::PARAM_INT);
$stmt_panier->bindParam(':total', $total, PDO::PARAM_STR);
$stmt_panier->bindParam(':date_creation', $date, PDO::PARAM_STR);
$stmt_panier->execute();
$panier_id = $conn->lastInsertId();

// Insérer dans les commandes
$requete_commande = "INSERT INTO commandes (quantite, total, panier, date_creation, date_modification, produit) VALUES (:quantite, :total, :panier_id, :date_creation, :date_modification, :id_produit)";
$stmt_commande = $conn->prepare($requete_commande);
$stmt_commande->bindParam(':quantite', $quantite, PDO::PARAM_INT);
$stmt_commande->bindParam(':total', $total, PDO::PARAM_STR);
$stmt_commande->bindParam(':panier_id', $panier_id, PDO::PARAM_INT);
$stmt_commande->bindParam(':date_creation', $date, PDO::PARAM_STR);
$stmt_commande->bindParam(':date_modification', $date, PDO::PARAM_STR);
$stmt_commande->bindParam(':id_produit', $id_produit, PDO::PARAM_INT);
$stmt_commande->execute();

header("location: ../panier.php");
exit();
?>
