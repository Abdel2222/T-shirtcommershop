<?php
session_start();
if (isset($_SESSION['email'])) {
  header('location:profile.php');
  exit();
}

include "../inc/functions.php";
$user = true;

if (!empty($_POST)) {
  $email = $_POST['email'];
  $password = $_POST['password'];

  if ($email === 'admin@eshop.be') {
    // L'email correspond à l'administrateur
    if ($password === '1212') {
      // Mot de passe correct
      $_SESSION['email'] = $email;
      header('location:profile.php');
      exit();
    } else {
      // Mot de passe incorrect
      echo '<script> 
        Swal.fire({
          title: "Erreur !",
          text: "Mot de passe incorrect",
          icon: "error",
          confirmButtonText: "OK",
          timer: 2000
        });
      </script>';
    }
  } else {
    // Email non autorisé
    echo '<script> 
      Swal.fire({
        title: "Erreur !",
        text: "Adresse email non autorisée",
        icon: "error",
        confirmButtonText: "OK",
        timer: 2000
      });
    </script>';
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>E-SHOP</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.16.6/sweetalert2.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous" />
</head>

<body>
  
  <div class="col-12 p-5">
    <h1 class="text-center"> Espace Admin : Connexion</h1>
    <form action="connexion.php" method="post">
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email address</label>
        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
      </div>

      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
        <input type="password" name="password" class="form-control" id="exampleInputPassword1">
      </div>

      <button type="submit" class="btn btn-primary">Save</button>
    </form>
  </div>
  <?php 
include "../inc/footer.php";
?>
     
  
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.16.6/sweetalert2.all.min.js"></script>

</body>
</html>
