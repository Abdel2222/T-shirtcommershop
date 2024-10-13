<?php
include "inc/functions.php";

$categories = getAllCategories();

if (isset($_GET['id'])) {
    $produit = getProduitById($_GET['id']);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>E-SHOP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous" />
    <style>
        body {
            background-color: #f7f7f7;
            font-family: Arial, sans-serif;
        }

        .card {
            background-color: #fff;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.15); /* Ajoute une ombre subtile pour le relief */
            border-radius: 15px; /* Arrondit les coins de la carte */
            overflow: hidden; /* S'assure que tout débordement d'image est coupé */
        }

        .card-img-top {
            height: 400px; /* Hauteur de l'image */
            width: 100%; /* Largeur de l'image pour remplir la carte */
            object-fit: contain; /* Affiche toute l'image sans la couper */
            border-radius: 15px 15px 0 0; /* Arrondit uniquement les coins supérieurs */
            object-position: center; /* Centre l'image */
        }

        .card-title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
            text-align: center; /* Centre le texte pour un meilleur design */
        }

        .card-text {
            font-size: 18px;
            color: #555;
            text-align: center; /* Centre également la description */
            margin-bottom: 15px;
        }

        .list-group-item {
            font-size: 18px;
            font-weight: bold;
            border: none;
            background-color: transparent;
            text-align: center; /* Centre les informations de la liste */
        }

        .btn-success {
            background-color: #28a745;
            border-color: #28a745;
            font-size: 18px;
            padding: 10px 20px;
            width: 100%;
            margin-top: 10px; /* Ajoute un espace en haut du bouton */
            border-radius: 5px; /* Arrondit les coins du bouton */
        }

        .btn-success:hover {
            background-color: #218838;
            border-color: #1e7e34;
        }
    </style>
</head>

<body>
    <?php include "inc/header.php"; ?>

    <div class="row justify-content-center mt-5">
        <div class="col-8">
            <div class="card">
                <img src="images/<?php echo $produit['image']; ?>" class="card-img-top" alt="Product Image">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $produit['nom'] ?></h5>
                    <p class="card-text"><?php echo $produit['description'] ?>.</p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><?php echo $produit['prix'] ?> Euro</li>
                    <?php foreach ($categories as $c) {
                        if ($c['id'] == $produit['categorie']) {
                            echo '<button class="btn btn-success">' . $c['nom'] . '</button>';
                        }
                    } ?>
                </ul>
                <div class="col-12">
                    <form class="d-flex" action="actions/commander.php" method="post">
                        <input type="hidden" name="produit" value="<?php echo $produit['id'] ?>">
                        <input type="number" class="form-control" name="quantite" step="1"
                            placeholder="Quantité du produit...">
                        <button type="submit" class="btn btn-success">Commander</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php include "inc/footer.php"; ?>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min
