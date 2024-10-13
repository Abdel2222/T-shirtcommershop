<?php
session_start();
include "../../inc/functions.php";
$conn = connect();

// Vérifiez si l'ID du produit à supprimer est passé en tant que paramètre
if (isset($_GET['id'])) {
    $idProduit = $_GET['id'];

    // Supprimez le produit de la table "produits"
    $requete1 = "DELETE FROM produits WHERE id = $idProduit";
    $resultat1 = $conn->query($requete1);

    // Supprimez le produit de la table "stocks"
    $requete2 = "DELETE FROM stocks WHERE produit = $idProduit";
    $resultat2 = $conn->query($requete2);

    // Vérifiez si les suppressions ont réussi
    if ($resultat1 && $resultat2) {
        $_SESSION['success_message'] = "Le produit a été supprimé avec succès.";
        header('location: liste.php');
        exit();
    } else {
        $_SESSION['error_message'] = "Erreur lors de la suppression du produit : " . $conn->error;
        header('location: liste.php');
        exit();
    }
}
?>

