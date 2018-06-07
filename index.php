<?php
$titre_page="Accueil";
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

    <div class="container">
    <div class="row">
    <div class="col-sm-12"><h1 style="text-align:center;">Bienvenue sur l'interface de gestion du système <br><strong><?php print $titre_site; ?></strong></h1><img src="images/bandeau.jpg" width="100%" style="margin-bottom:20px;"></div>
        <div class="col-sm-4">
        <div class="card text-center" style="width: 18rem;height:180px;">
  <div class="card-body">
    <h5 class="card-title">Validation élève</h5>
    <p class="card-text">Validation des inscriptions élèves</p>
    <a href="valid_eleve.php?transfer=index.php" class="btn01 btn btn-primary" style="background-color:#00AFE9!important;">Validation</a>
  </div>
</div>
        </div>
        <div class="col-sm-4" style="margin-bottom: 10px;">
        <div class="card text-center" style="width: 18rem; height:180px;">
  <div class="card-body">
    <h5 class="card-title">Liste Classe</h5>
    <p class="card-text">Afficher la liste des élèves</p>
    <a href="liste_classes.php?transfer=index.php" class="btn01 btn btn-primary" style="background-color:#00AFE9!important;">Classes</a>
  </div>
</div>
        </div>
        <div class="col-sm-4" style="margin-bottom: 10px;">
        <div class="card text-center" style="width: 18rem;height:180px;">
  <div class="card-body">
    <h5 class="card-title">Modification EDT</h5>
    <p class="card-text">Modifier l'emploi du temps</p>
    <a href="liste_classes.php?transfer=index.php" class="btn01 btn btn-primary" style="background-color:#00AFE9!important;">Modification EDT</a>
  </div>
</div>
        </div>
        <div class="col-sm-4" style="margin-bottom: 10px;">
        <div class="card text-center" style="width: 18rem;height:180px;">
  <div class="card-body">
    <h5 class="card-title">Nombre d'élève actuel :</h5>
    <p class="card-text">Affichage du nombre d'élèves actuel.</p>
    <a href="#" class="btn01 btn btn-primary" style="background-color:#00AFE9!important;">Afficher le nombre d'élève</a>
  </div>
</div>
        </div>
        <div class="col-sm-4" style="margin-bottom: 10px;">
        <div class="card text-center" style="width: 18rem;height:180px;">
  <div class="card-body">
    <h5 class="card-title">Dernier élève :</h5>
    <p class="card-text">Afficher le dernier élève.</p>
    <a href="#" class="btn01 btn btn-primary" style="background-color:#00AFE9!important;">Dernier élève</a>
  </div>
</div>
        </div>
        <div class="col-sm-4" style="margin-bottom: 10px;">
        <div class="card text-center" style="width: 18rem;height:180px;">
  <div class="card-body">
    <h5 class="card-title">Rapport d'incident</h5>
    <p class="card-text">Rapports des incidents survenus.</p>
    <a href="rapport_incident.php?transfer=index.php" class="btn01 btn btn-primary" style="background-color:#00AFE9!important;">Rapports</a>
  </div>
</div>
        </div>
    </div>
</div>

    </main>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="assets/js/bootstrap.min.js"></script>
  </body>
</html>
