<?php
session_start();
// 1. Récupération des données du formulaire
$id = $_POST['idc'];

$nom = $_POST['nom'];
$description = $_POST['description'];

$date_modification = date("Y-m-d");

// 2. La chaîne de connexion
include "../../inc/functions.php";
$conn = connect();

// 3. Création de la requête et exécution
$requete = "UPDATE  categories set nom = '$nom',description = '$description' , date_modification = '$date_modification'  where id ='$id' " ;
$resultat = $conn->query($requete);

if ($resultat) {
    header('location: liste.php');
    exit();
} else {
    echo "Erreur lors de l'exécution de la requête : " . $conn->error;
}
?>
