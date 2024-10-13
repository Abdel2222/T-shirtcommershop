<?php 
function connect()
{
    $servername = "localhost";
$username = "root";
$password = "";
$DBname = "e-shop";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$DBname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 // echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
return $conn ;
}

function getAllCategories(){
    $conn = connect();
    



$requette = "SELECT * FROM categories";
$resultat = $conn->query($requette);
$categories = $resultat ->fetchAll();
//var_dump($categories) ;
return $categories;
}
function getAllProduits(){
    $conn = connect();
    
   
    
  
    $requette = "SELECT * FROM produits";
    $resultat = $conn->query($requette);
    $produits = $resultat ->fetchAll();
   
    return $produits;
    }
    function  searchProduits($keywords){
        $conn = connect();

$DBname = "e-shop";


$requette = "SELECT * FROM produits WHERE  nom like '%$keywords%' ";
$resultat = $conn->query($requette);
$produits = $resultat ->fetchAll();

return $produits;
}
function getProduitById($id){
    $conn = connect() ;
    $requette = "SELECT * FROM produits WHERE id= $id";
    $resultat = $conn->query($requette);
    $produit = $resultat ->fetch() ;
    return $produit ;
}
 function  Addvisiteur($data)
{
    $conn = connect();
    $mphash = md5($data['password'])  ;//mot de passe hachage 
    $requette = " INSERT INTO visiteurs (nom, prenom, gsm, password, email)
                 VALUES ('" . $data['nom'] . "', '" . $data['prenom'] . "', '" . $data['gsm'] . "', '" .  $mphash  . "', '" . $data['email'] . "')";

$resultat = $conn->query($requette);
if($resultat){
    return true ;
}else{
    return false ;
}
       
}
function ConnectVisiteur($data) {
    $conn = connect();
    $email = $data['email'];
    $password =md5($data['password']) ;
    $requete = "SELECT * FROM visiteurs WHERE email = :email AND password = :password";
    $stmt = $conn->prepare($requete);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->execute();
    $user = $stmt->fetch();
   
     return $user;
}
function ConnectAdmin($data) {
    $conn = connect();
    $email = $data['email'];
    $password = md5($data['password']);
    $requete = "SELECT * FROM visiteurs WHERE email = :email AND password = :password";
    $stmt = $conn->prepare($requete);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->execute();
    $user = $stmt->fetch();
    
    return $user;
  }
  function getAllusers()
{
    $conn = connect();
    $requete = "SELECT * FROM visiteurs WHERE etat = 0";
    $stmt = $conn->prepare($requete);
    $stmt->execute(); // Exécuter la requête
    $users = $stmt->fetchAll();
    return $users;
}
function getStocks(){
    $conn = connect();
    $requete = "SELECT p.nom,s.id ,s. quantite FROM produits p ,stocks s  WHERE p.id = s.produit";
    $stmt = $conn->query($requete);
    $stocks = $stmt->fetchAll();
    return $stocks;
}
function getPrixProduit($id)
{
    $conn = connect();

    $requete = "SELECT prix FROM produits WHERE id = :id";
    $stmt = $conn->prepare($requete);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $result = $stmt->fetch();

    return $result['prix'];
}

// Dans functions.php

/**
 * Récupère toutes les commandes du panier pour un visiteur donné.
 * @param int $visiteurId L'ID du visiteur
 * @return array Un tableau contenant les commandes du panier
 */
function getAllCommandes($visiteurId) {
    $conn = connect();
  
    // Requête SQL pour récupérer les commandes du panier pour le visiteur actuel depuis la base de données
    $requete_commandes = "SELECT * FROM commandes WHERE panier IN (SELECT id FROM paniers WHERE visiteur = '$visiteurId')";
    $resultat_commandes = $conn->query($requete_commandes);
    $commandes = $resultat_commandes->fetchAll(PDO::FETCH_ASSOC);
  
    return $commandes;
  }
  