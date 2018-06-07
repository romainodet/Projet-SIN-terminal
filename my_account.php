<?php
$titre_page="Mon compte";
//include auth.php file on all secure pages
include("auth.php");
include_once('db.php');

if (isset($_POST['envoi'])) {
  $email = stripslashes($_REQUEST['email']);
  //escapes special characters in a string
$email = mysqli_real_escape_string($con,$email);


$tel = stripslashes($_REQUEST['tel']);
  //escapes special characters in a string
$tel = mysqli_real_escape_string($con,$tel);

$id = stripslashes($donnees_users['id']);
  //escapes special characters in a string
$id = mysqli_real_escape_string($con,$id);


      $query001 = "UPDATE users SET email = '" . $email . "', tel = '". $tel ."' WHERE id = '". $id ."'    ";
      $result001 = mysqli_query($con,$query001) ;
      
}
      
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
<?php if (isset($_POST['envoi'])) { if ($con->query($query001) === TRUE) {
        echo "<div class=\"alert alert-success\" role=\"alert\">
        Les données de votre compte ont bien été actualisés !
        <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
    <span aria-hidden=\"true\">&times;</span>
  </button>
        </div>";
    } else {
        

      echo "<div class=\"alert alert-danger\" role=\"alert\">
      <h4 class=\"alert-heading\">Erreur !</h4>
      <p>Une erreur c'est produite lors de l'envoi des données !</p>
      <hr>
      <p class=\"mb-0\"><strong>Code erreur SQL : </strong>" . $con->error ."</p>
    </div><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
    <span aria-hidden=\"true\">&times;</span>
  </button></div>";
    }}
 ?>
<div class="table-responsive">
<table class="table table-bordered" >

<thead class="thead-dark"style="background-color:#00AFE9!important;">
                <tr>
                    <th scope="col">Catégorie utilisateur :</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">Date de Naissance</th>
                    <th scope="col">Téléphone</th>
                    <th scope="col">Email</th>
                    
                </tr></thead>
            
            <?php
            if($donnees_users['categorie_users'] == "1"){
            $categorie_util="Elève";
            }
            elseif($donnees_users['categorie_users'] == "2"){

              $categorie_util="Professeur";
            }
            elseif($donnees_users['categorie_users'] == "3"){

              $categorie_util="Vie Scolaire";
            }
            elseif($donnees_users['categorie_users'] == "4"){

              $categorie_util="Intendance";
            }
            elseif($donnees_users['categorie_users'] == "5"){

              $categorie_util="Administrateur";
            }else{
              $categorie_util="Erreur : Catégorie non reconnu merci de prendre contact avec l'admin.";
            }
            ?>



                <tr>
                    <th scope="row"><?php echo $categorie_util ?></th>
                    
                    <td><?php echo $donnees_users['nom'];?></td>
                    <td><?php echo $donnees_users['prenom']; ?></td>
                    <?php
                    $timestamp = strtotime($donnees_users['datenaissance']);
                    echo '<td>'. date('d/m/Y', $timestamp). '</td>';?>
                   <form action="" method="post">
                   
                  <td><input type="tel" name="tel" value="<?php echo $donnees_users['tel'];?>"></td>
                    <td><input type="email" name="email" value="<?php echo $donnees_users['email'];?>">
                    </td>
                    
                </tr>
            
        <table>
        <input style="background-color: #00AFE9!important;"class="btn btn-primary" type="submit" value="Modifier mes informations" name="envoi"></form>
</div>


    </main>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="assets/js/bootstrap.min.js"></script>
  </body>
</html>
