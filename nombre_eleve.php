<?php
$titre_page="Nombre d'élèves";
//include auth.php file on all secure pages
include("auth.php");
?>
<!doctype html>
<html lang="fr">
  <head>
    
    <?php include('assets/php/header.php') ?>
    <link href="assets/css/starter-template.css" rel="stylesheet">
  </head>

  <body>

  <?php include('assets/php/nav.php');?>

    <main role="main" class="container">
    <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="././index.php">Accueil</a></li>
    <li class="breadcrumb-item active" aria-current="page"><?php echo $titre_page?></li>
  </ol>
</nav>
<h1><?php echo $titre_page?> :</h1>


    </main>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="assets/js/bootstrap.min.js"></script>
  </body>
</html>
