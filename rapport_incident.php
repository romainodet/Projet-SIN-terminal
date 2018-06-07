<?php
$titre_page="Rapports d'incidents";
//include auth.php file on all secure pages
include("auth.php");
include("db.php");
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
<h1><?php echo $titre_page;?> :</h1>
<div class="container">
    <div class="row">
        
    
<?php
$incidents = $con->query('SELECT id_rapport, date_heure_debut, date_heure_fin, message FROM rapports_incidents ORDER BY date_heure_debut');

while ($donnees_incidents = mysqli_fetch_array($incidents)){
echo '<div class="col-sm-4" style="margin-bottom:10px;">';
  $timestamp = strtotime($donnees_incidents['date_heure_debut']);
    $timestamp_fin = strtotime($donnees_incidents['date_heure_fin']);                  


echo '<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">Incident</h5>
    <h6 class="card-subtitle mb-2 text-muted">Incident survenu le '.date('d/m/Y', $timestamp).' à '.date('H:i:s', $timestamp).' jusqu\'a '.date('H:i:s', $timestamp_fin).'</h6>
    <p class="card-text">'. $donnees_incidents['message'] .'</p>
    
  </div>
</div>';

echo'</div>';
}


?></div>
</div>

    </main>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="assets/js/bootstrap.min.js"></script>
  </body>
</html>
