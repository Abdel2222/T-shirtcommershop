<?php
session_start();
include "../../inc/functions.php";
$categories = getAllCategories();
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.1/assets/img/favicons/favicon.ico">

    <title>Admin page profil </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous" />

    <link rel="canonical" href="https://getbootstrap.com/docs/4.1/examples/dashboard/">

    <!-- Bootstrap core CSS -->
    <link href="../../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../../css/dashboard.css" rel="stylesheet">
</head>

<body>
<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">E-SHOP</a>
        <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
        <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
                <a class="nav-link" href="../../index.php">Deconnexion</a>
            </li>
        </ul>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link " href="../../index.php">
                  <span data-feather="home"></span>
                  Home <span class="sr-only"></span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="#">
                  <span data-feather="file"></span>
                  Categories
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../produits/liste.php">
                  <span data-feather="shopping-cart"></span>
                  Products
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../visiteurs/liste.php">
                  <span data-feather="users"></span>
                  Customers
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../stocks/liste.php">
                  <span data-feather="bar-chart-2"></span>
                  Reports
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link " href="../profile.php">
                  <span data-feather="layers"></span>
                  Profile
                </a>
              </li>
            </ul>

         
           
          </div>
        </nav>

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2"> Liste des categories</h1>

                </div>
                <?php
                echo $_SESSION['email'];
                ?>
                <div><a class="btn btn-primary" data-toggle="modal" data-target="#ajouterModal">Ajouter</a>

                </div>


                <div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nom</th>
                                <th scope="col">Description</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            <?php
                            $i = 0;
                            foreach ($categories as $c) {
                                $i++;
                                print '   <tr>
        <th scope="row">'.$i.'</th>
        <td>'.$c['nom'].'</td>
        <td>'.$c['description']. '</td>
        <td>
          <a data-toggle="modal" data-target="#exampleModal'.$c['id'].'"  class=" btn btn-success">Modifier</a>
          
          <a onclick = "return poUpDeleteCategorie()" href="supprimer.php?idc='.$c['id'].' " class=" btn btn-danger"> Supprimer</a>
        </td>
      </tr>';
                            }
                            ?>


                        </tbody>
                    </table>
                    <!-- Button trigger modal -->



                </div>


            </main>

        </div>

    </div>

    <?php 
    foreach($categories as $index=> $categorie)
    {?>

 <!-- Modal -->
 <div class="modal fade" id="exampleModal<?php echo $categorie['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">modifier categories</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="modifier.php" method="post">
                        <input type="hidden" value ="<?php echo $categorie['id'] ; ?>" name="idc"/>
                        <div class="form-group">
                            <input type="text" name="nom" class="form-control" value="<?php echo $categorie['nom'] ; ?>" placeholder="nom de categories ...">
                        </div>
                        <div class="form-group">
                            <textarea name="description" class="form-control" placeholder="description de categories ..."><?php echo $categorie['description'] ; ?></textarea>
                        </div>


                </div>
                <div class="modal-footer">

                    <button type="submit" class="btn btn-primary">Modifier</button>

                </div>
                </form>

            </div>
        </div>
    </div>

<?php
    }
    ?>
    <!-- Modal -->
<div class="modal fade" id="ajouterModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ajouter une catégorie</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="ajout.php" method="post">
                    <div class="form-group">
                        <input type="text" name="nom" class="form-control" placeholder="Nom de la catégorie">
                    </div>
                    <div class="form-group">
                        <textarea name="description" class="form-control" placeholder="Description de la catégorie"></textarea>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Ajouter</button>
            </div>
            </form>
        </div>
    </div>
</div>

   

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>
        window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')
    </script>
    <script src="../../js/vendor/popper.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>

    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script> function poUpDeleteCategorie(){
      return confirm("Voulez vous supprimer vraiment?");
    }
    </script>

</body>

</html>