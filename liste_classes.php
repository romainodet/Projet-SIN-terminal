<?php
$titre_page="Liste des classes";
//include auth.php file on all secure pages
include("auth.php");
require('db.php');
 $classe_selectionne=0;
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
<div class="container">
<?php 
$listeclasseenvoi=0;
if (isset($_REQUEST['submit'])){
  $classe_selectionne = $_REQUEST['selection_classe'];
  $listeclasseenvoi=1;
  }

?>
<form action="" method="GET">
    <div class="row selectionneurdeclasse">
        <div class="selection_classe col-sm-10">

<select class="form-control" id="selection_classe" name="selection_classe" placeholder="Selectionner la classe">
<option value="" disabled selected>Sélectionner la classe</option>
<?php
$reponse = $con->query('SELECT * FROM classe');

while ($donnees = mysqli_fetch_array($reponse)){
echo "<option value=\"".$donnees['id_classe']."\">".$donnees['classe_nom']."</option>";
}


?>
</select></div>
        <div class="envoi col-sm-2">
        <button type="submit" class="btn btn-primary" name="submit" >Valider</button>
        </div></div><br>
        <?php


if($listeclasseenvoi==1){
  $classenom = $con->query('SELECT * FROM classe AS c WHERE c.id_classe = '.$classe_selectionne.'');
  $donnees_classenom = mysqli_fetch_array($reponse);
        echo '<h1 class=\"display-4\">'. $donnees_classenom['classe_nom'] .'</h1><hr>';
}
        
        ?>
<div class="table-responsive">
<table class="table table-bordered" >

<thead class="thead-dark"style="background-color:#00AFE9!important;">
                <tr>
                  <th scope="col">ID</th>
                    <th scope="col">Genre</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">Edition</th>
                    
                    
                </tr></thead>
                
                    
                    <?php 
                    echo '<tr>';
                    $listeclasseenvoi='0';
$reponse = $con->query('SELECT * FROM users AS u, classe AS c WHERE u.classe_user = '.$classe_selectionne.' AND u.classe_user = c.id_classe ORDER BY u.nom');
        $i='1';
while ($donnees = mysqli_fetch_array($reponse))
{
     
    //selectionner une classe $donnees['classe_nom']
   
    echo '<td>'.$i.'</td>';
    if($donnees['genre']== "Mr"){

      echo '<td>'.$donnees['genre'].' <i class="fas fa-mars"></i></td>';
           }else{
      
            echo '<td>'.$donnees['genre'].' <i class="fas fa-venus"></i></td>';
           }



echo '<td>'.$donnees['nom'].'</td>';
echo '<td>'.$donnees['prenom'].'</td>';
echo '<td><a href="modif_edt.php?id='.$donnees['id'] .'" target="blank"><i class="fas fa-edit"></i></a></td>';
echo '</tr>';
$classe_head=$donnees['classe_nom'];
$listeclasseenvoi='1';
$i++;
}
if($listeclasseenvoi=='0'){
  echo "<td colspan=\"10\">Classe non séléctionnée ou pas d'élèves dans la classe selectionnée</td></tr>";
}


if (isset($_POST['submit'])) {


   /* $query001= "UPDATE users SET valide='1', ld ='".$ld."', lf='".$lf."', md='".$md."', mf='".$mf."',jd='".$jd."',jf='".$jf."', vd='".$vd."',vf='".$vf."' WHERE id = '". $id ."'";
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
    }*/
}
?>
                    
                    
                </tr>
            
        <table>
       <!-- <input style="background-color: #00AFE9!important;"class="btn btn-primary" type="submit" value="Modifier mes informations" name="envoi">--></form>
</div>
        </div>
    </div>
</div>


      
    



    
    
</form>

    </main>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script>
  </body>
</html>
