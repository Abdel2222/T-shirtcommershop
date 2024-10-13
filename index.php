<?php 
session_start();

include "inc/functions.php";

$categories = getAllCategories();

if (!empty($_POST)) {
  $produits = searchProduits($_POST['search']);
} else {
  $produits = getAllProduits();
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>E-SHOP</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM"
      crossorigin="anonymous"
    />
    <style>
      body {
        background-color: #f7f7f7;
        font-family: Arial, sans-serif;
      }

      .container {
        margin-top: 50px;
      }

      .card {
        border: none;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
      }

      .card-img-top {
        height: 200px;
        object-fit: cover;
      }

      .card-title {
        font-size: 18px;
        font-weight: bold;
        margin-bottom: 10px;
      }

      .card-text {
        font-size: 14px;
        color: #777;
        margin-bottom: 15px;
      }

      .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
      }

      .btn-primary:hover {
        background-color: #0069d9;
        border-color: #0062cc;
      }
    </style>
  </head>
  
  <body>
  <?php
  include "inc/header.php";
  ?>
    <div class="container">
      <div class="row">
        <?php
        foreach ($produits as $produit) {
          echo '
          <div class="col-3 mt-4">
            <div class="card">
              <img src="images/' . $produit['image'] . '" class="card-img-top" alt="..." />
              <div class="card-body">
                <h5 class="card-title">' . $produit['nom'] . '</h5>
                <p class="card-text">' . $produit['description'] . '</p>
                <a href="produit.php?id=' . $produit['id'] . '" class="btn btn-primary">Afficher</a>
              </div>
            </div>
          </div>';
        }
        ?>
      </div>
    </div>
    <?php include "inc/footer.php"; ?>
  </body>
  <script
    src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"
  ></script>
  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"
    integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS"
    crossorigin="anonymous"
  ></script>
</html>

