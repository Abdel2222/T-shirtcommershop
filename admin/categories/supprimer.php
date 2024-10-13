<?php
session_start() ;
$idcategorie = $_GET['idc'];
include "../../inc/functions.php";
$conn = connect();

$requete = "DELETE FROM categories WHERE id = :id";
$resultat = $conn->prepare($requete);
$resultat->bindParam(':id', $idcategorie);

if ($resultat->execute()) {
    echo "Catégorie supprimée avec succès";
} else {
    echo "Erreur lors de la suppression de la catégorie";
}
?>
