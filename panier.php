<?php
session_start();

include "inc/functions.php";

if (!isset($_SESSION['nom'])) {
    header("location: ../connexion.php");
    exit();
}

$commandes = getAllCommandes($_SESSION['id']); // Fonction pour récupérer les commandes du panier par l'ID du visiteur
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>E-SHOP</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <?php include "inc/header.php"; ?>
  <div class="row col-12 mt-5 p-4">
    <h1>Panier utilisateur</h1>
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Produit</th>
          <th scope="col">Quantité</th>
          <th scope="col">Total</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $totalGlobal = 0;
        foreach ($commandes as $index => $commande) {
          $num = $index + 1;
          $quantite = $commande['quantite'];
          $produit = getProduitById($commande['produit']);
          $prixProduit = $produit['prix'];
          $total = $quantite * $prixProduit;

          $totalGlobal += $total;

          echo '<tr>
            <th scope="row">' . $num . '</th>
            <td>' . $produit['nom'] . '</td>
            <td>' . $quantite . '</td>
            <td>' . $total . ' euro</td>
            <td>
              <form method="post" action="actions/supprimer_commande.php">
                <input type="hidden" name="commande_id" value="' . $commande['id'] . '">
                <button type="submit" class="btn btn-danger">Supprimer</button>
              </form>
            </td>
          </tr>';
        }
        ?>
      </tbody>
    </table>
    <div class="text-end">
      <h3>Total : <?php echo $totalGlobal; ?> euro</h3>
    </div>

    <!-- Formulaire de sélection du mode de paiement -->
    <form action="payment_form.php" method="POST">
      <h4>Choisissez votre mode de paiement :</h4>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="payment_method" value="paypal" id="paypal" required>
        <label class="form-check-label" for="paypal">Payer par PayPal</label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="payment_method" value="stripe" id="stripe" required>
        <label class="form-check-label" for="stripe">Payer par Carte Bancaire (Visa/Mastercard)</label>
      </div>
      
      <input type="hidden" name="total" value="<?php echo $totalGlobal; ?>">
      <button type="submit" class="btn btn-success mt-4">Procéder au paiement</button>
    </form>
  </div>
  <?php include "inc/footer.php"; ?>
</body>
</html>
