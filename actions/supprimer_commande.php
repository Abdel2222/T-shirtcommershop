<?php
session_start();
include "../inc/functions.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Vérifier si l'identifiant de la commande est présent dans la requête POST
  if (isset($_POST['commande_id'])) {
    $commandeId = $_POST['commande_id'];
    
    // Supprimer la commande du panier dans la base de données
    $visiteur = $_SESSION['id'];
    $conn = connect();
    $requete_suppression = "DELETE FROM commandes WHERE id = '$commandeId' AND panier IN (SELECT id FROM paniers WHERE visiteur = '$visiteur')";
    $resultat_suppression = $conn->query($requete_suppression);
    
    if ($resultat_suppression) {
      // Redirection vers la page du panier
      header("Location: ../panier.php");
      exit();
    } else {
      // Gérer l'erreur de suppression
      echo "Une erreur s'est produite lors de la suppression de la commande.";
    }
  }
}
