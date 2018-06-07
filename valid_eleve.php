<?php
$titre_page="Validation";
//include auth.php file on all secure pages
include("auth.php");
include('db.php');
?>
<html lang="fr">
  <head>
 
    <?php include('assets/php/header.php') ?>
    <link href="assets/css/starter-template.css" rel="stylesheet">
<style type="text/css">
</style>
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

<div class="container">
    <div class="row">
   
                    <?php 
                    
$reponse = $con->query('SELECT * FROM users AS u, classe AS c WHERE u.valide = 0x00 AND u.classe_user = c.id_classe ORDER BY id LIMIT 1 ');
        
while ($donnees = mysqli_fetch_array($reponse))
{
    if($donnees['categorie_users'] == "1"){
    $categorie_users="Elève";
    }
    elseif($donnees['categorie_users'] == "2"){

      $categorie_users="Professeur";
    }
    elseif($donnees['categorie_users'] == "3"){

      $categorie_users="Vie Scolaire";
    }
    elseif($donnees['categorie_users'] == "4"){

      $categorie_users="Intendance";
    }
    elseif($donnees['categorie_users'] == "5"){

      $categorie_users="Administrateur";
    }else{
      $categorie_users="Erreur : Catégorie non reconnu merci de prendre contact avec l'admin.";
    }

    $timestamp = strtotime($donnees['datenaissance']);


    echo '

    <div class="col-sm-3" style="padding: 5px; margin-left:5%; margin-right:5%;"><div class="card" style="width: 40rem; text-align:center;">
  <!--<img class="card-img-top" src=".../100px180/?text=Image cap" alt="Card image cap">-->
  <div class="card-body" >
  <input style="background-color: #00AFE9!important; width:100%;"class="btn btn-primary" type="submit" value="Modifier les informations" name="envoi">
    <h5 class="card-title">'.$donnees['genre'].' '. $donnees['nom'] . ' '.$donnees['prenom'].'</h5>
    <p class="card-text">'.$categorie_users.' en classe de <strong>'.$donnees['classe_nom'].'</strong></p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">Née le : '.date('d/m/Y', $timestamp).'</li>
    <li class="list-group-item">Téléphone : '.$donnees['tel'].'</li>
    <li class="list-group-item">Email : <a href="mailto:'.$donnees['email'].'">'.$donnees['email'].'</a></li>
    <li class="list-group-item">Numéro de carte : '.$donnees['numcarte'].'</li>
  </ul>
  <ul class="list-group list-group-flush">
  <form method="POST"><select style="display:none;" name="id_user">
<option value="'.$donnees['id'].'">'.$donnees['id'].'</option>
</select>
    <li class="list-group-item">Lundi pair : <input type="time" name="lundi_debut_paire_debut" value="12:00"> à <input value ="13:30" type="time" name="lundi_debut_paire_fin"></li>
    <li class="list-group-item">Mardi pair : <input type="time" name="mardi_debut_paire_debut" value="12:00"> à <input value ="13:30" type="time" name="mardi_debut_paire_fin" ></li>
    <li class="list-group-item">Jeudi pair : <input type="time" name="jeudi_debut_paire_debut" value="12:00"> à <input value ="13:30" type="time" name="jeudi_debut_paire_fin" ></li>
    <li class="list-group-item">Vendredi pair : <input type="time" name="vendredi_debut_paire_debut" value="12:00"> à <input value ="13:30" type="time" name="vendredi_debut_paire_fin" ></li>

    <li class="list-group-item">Lundi impair : <input type="time" name="lundi_debut_impaire_debut" value="12:00"> à <input value ="13:30" type="time" name="lundi_debut_impaire_fin" ></li>
    <li class="list-group-item">Mardi impair : <input type="time" name="mardi_debut_impaire_debut" value="12:00"> à <input value ="13:30" type="time" name="mardi_debut_impaire_fin" ></li>
    <li class="list-group-item">Jeudi impair : <input type="time" name="jeudi_debut_impaire_debut" value="12:00"> à <input value ="13:30" type="time" name="jeudi_debut_impaire_fin" ></li>
    <li class="list-group-item">Vendredi impair : <input type="time" name="vendredi_debut_impaire_debut" value="12:00"> à <input value ="13:30" type="time" name="vendredi_debut_impaire_fin" ></li>
  </ul></form>
  
</div>

</div>';
    
   
}

  


if (isset($_POST['submit'])) {
$ld = stripslashes($_REQUEST['ld']);
  //escapes special characters in a string
$ld = mysqli_real_escape_string($con,$ld);

$lf = stripslashes($_REQUEST['lf']);
  //escapes special characters in a string
$lf = mysqli_real_escape_string($con,$lf);

$md = stripslashes($_REQUEST['md']);
  //escapes special characters in a string
$md = mysqli_real_escape_string($con,$md);

$mf = stripslashes($_REQUEST['mf']);
  //escapes special characters in a string
$mf = mysqli_real_escape_string($con,$mf);

$jd = stripslashes($_REQUEST['jd']);
  //escapes special characters in a string
$jd = mysqli_real_escape_string($con,$jd);

$jf = stripslashes($_REQUEST['jf']);
  //escapes special characters in a string
$jf = mysqli_real_escape_string($con,$jf);

$vd = stripslashes($_REQUEST['vd']);
  //escapes special characters in a string
$vd = mysqli_real_escape_string($con,$vd);

$vf = stripslashes($_REQUEST['vf']);
  //escapes special characters in a string
$vf = mysqli_real_escape_string($con,$vf);

$id = stripslashes($_REQUEST['id_user']);
  //escapes special characters in a string
$id = mysqli_real_escape_string($con,$id);


    $query001= "UPDATE users SET valide='1', ld ='".$ld."', lf='".$lf."', md='".$md."', mf='".$mf."',jd='".$jd."',jf='".$jf."', vd='".$vd."',vf='".$vf."' WHERE id = '". $id ."'";
    $result001 = mysqli_query($con,$query001) ;
    
   
      if ($con->query($query001) === TRUE) {
        echo "<div class=\"alert alert-success\" role=\"alert\">
        Envoi des données validé pour la fiche <b>#000".$id."</b>
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
    }
}
?>
                    
                    
                </div>
              </div>

        <table>
        </form>
</div>

    </main>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    
  </body>
</html>
