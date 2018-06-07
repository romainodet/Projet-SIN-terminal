    <?php

    $titre_page="Modification de la fiche élève";
    //include auth.php file on all secure pages
    include("auth.php");
    require("db.php");
    $get=$_GET['id'];
    $donnees=NULL;
    ?>
    <!doctype html>
    <html lang="fr">
      <head>
        
        <?php include('assets/php/header.php') ?>
        <link href="assets/css/starter-template.css" rel="stylesheet">
        <link href="assets/css/card_eleve.css" rel="stylesheet">
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
    <?php
    if($get != NULL){
    $reponse = $con->query('SELECT * FROM users AS u, classe AS c, passages AS p WHERE u.id = '.$_GET['id'].' AND u.classe_user = c.id_classe AND p.id_carte=u.numcarte');
            $i='1';
    $donnees = mysqli_fetch_array($reponse);
}

           
    //$donnees_passages = mysqli_fetch_array($reponse_passages);
    ?>

    <h1><?php echo $titre_page?> de <?php if($donnees['id']!= NULL){echo $donnees['nom'].' '.$donnees['prenom'];}else{echo "<u>utilisateur inexistant</u>";} ?></h1>
    <?php

    if($donnees['id']!= NULL){

     echo '<div class="row my-2">
            <div class="col-lg-8 order-lg-2">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a href="" data-target="#profile" data-toggle="tab" class="nav-link active">Profil</a>
                    </li>
                    <li class="nav-item">
                        <a href="" data-target="#messages" data-toggle="tab" class="nav-link">Messages reçus</a>
                    </li>
                    <li class="nav-item">
                        <a href="" data-target="#edit" data-toggle="tab" class="nav-link">Editer</a>
                    </li>
                </ul>
                <div class="tab-content py-4">
                    <div class="tab-pane active" id="profile">
                        <h5 class="mb-3">Profil de '.$donnees['prenom'].' '.$donnees['nom'].'</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <h6>Classe :</h6> <p>'.$donnees['classe_nom'].'</p>
                                
                                <h6>Date de naissance : </h6><p>';
  $timestamp = strtotime($donnees['datenaissance']);
                      echo date('d/m/Y', $timestamp);
                                echo'</p>
                               
                            </div>
                            <div class="col-md-6">
                                <h6>Courriel :</h6>
                                <p><a href="mailto:'.$donnees['email'].'">'.$donnees['email'].'</a></p>
                                <h6>Téléphone :</h6>
                                <p>'.$donnees['tel'].'</p>
                                
                            </div>
                            <div class="col-md-12">
                                <h5 class="mt-2"><span class="fa fa-clock-o ion-clock float-right"></span> Passages récents</h5>
                                <table class="table table-sm table-hover table-striped">
                                    <tbody>  
  ';  



  $passages = $con->query('SELECT p.date_heure FROM users AS u, passages AS p WHERE u.id = '.$_GET['id'].' AND p.id_carte=u.numcarte ORDER BY p.date_heure');
                                    while ($donnees_passages = mysqli_fetch_array($passages)){
  echo "<tr>
                                            <td>
                                                Passage le <strong>". strftime('%A %d %B %Y </strong>à<strong> %H:%M', strtotime($donnees_passages['date_heure'])). "</strong> au self service. </strong>
                                            </td>
          </tr>
      ";
  }                                  
                  echo '
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!--/row-->
                    </div>
                    <div class="tab-pane" id="messages">
                        <div class="alert alert-info alert-dismissable">
                            <a class="panel-close close" data-dismiss="alert">×</a><strong>1</strong> Nouveau message de la part de <strong>"Vie Scolaire"</strong>
                        </div>
                        <table class="table table-hover table-striped">
                            <tbody>                                    
                                <tr>
                                    <td>
                                       <span class="float-left font-weight-bold">Vie Scolaire : Mise à jour de l\'emploi du temps :</span><span class="float-right font-italic">14/05/2018</span><br><span class="float-left font-weight-light">Dossier suivi par : Déborah<strong></strong></span><br><hr> Bonjour '.$donnees['prenom'].',<br> nous t\'informons que ton emploi du temps à été modifié le mardi semaine B. <br>Cordialement, la vie scolaire 
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                       <span class="float-left font-weight-bold">Intendance : Numéro de carte : </span><span class="float-right font-italic">24/03/2018</span><br><span class="float-left font-weight-light">Dossier suivi par : Mme JOND<strong></strong></span><br><hr> Bonjour '.$donnees['prenom'].',<br> nous t\'informons que ton numéro de carte de cantine à été modifié suite à la remise de la nouvelle carte. <br>Cordialement, l\'intendance 
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                       <span class="float-left font-weight-bold">Administration : Création de la carte : </span><span class="float-right font-italic">23/03/2018</span><br><span class="float-left font-weight-light">Dossier suivi par : Mme CHARTRAIN<strong></strong></span><br><hr> Bonjour '.$donnees['prenom'].',<br> nous t\'informons que ta nouvelle carte de cantine est disponible à l\'intendance. <br>Cordialement, le secretariat 
                                    </td>
                                </tr>
                                
                            </tbody> 
                        </table>
                    </div>
                    <div class="tab-pane" id="edit">
                        <form  method="POST">
                        <fieldset disabled>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Nom</label>
                                <div class="col-lg-9">
                                    <input id="disabledInput" class="form-control" type="text" value="'.$donnees['nom'].'">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Prénom</label>
                                <div class="col-lg-9">
                                    <input id="disabledInput" class="form-control" type="text" value="'.$donnees['prenom'].'">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Date de naissance</label>
                                <div class="col-lg-9">
                                    <input id="disabledInput" class="form-control" type="date" value="'.$donnees['datenaissance'].'">
                                </div>
                            </div>
                            </fieldset>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Courriel</label>
                                <div class="col-lg-9">
                                    <input class="form-control" type="email" name="email" value="'.$donnees['email'].'">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Téléphone</label>
                                <div class="col-lg-9">
                                    <input class="form-control" type="tel" name="tel" value="'.$donnees['tel'].'">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Mot de passe</label>
                                <div class="col-lg-9">
                                    <input class="form-control" type="password" name="password" >
                                </div>
                            </div>
                            <div class="form-group row">
                             <label class="col-lg-3 col-form-label form-control-label">Compte activé</label>
                                 <div class="form-check form-check-inline">
                                 <div class="col-lg-9">
';
if($donnees['valide']==1){
echo '<input class="form-check-input" type="radio" name="valide" id="inlineRadio1" value="1" checked="checked">
  <label class="form-check-label" for="inlineRadio1">Oui</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="valide" id="inlineRadio2" value="0">
  <label class="form-check-label" for="inlineRadio2">Non</label>';

}elseif($donnees['valide']==0){

echo'<input class="form-check-input" type="radio" name="valide" id="inlineRadio1" value="1">
  <label class="form-check-label" for="inlineRadio1">Oui</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="valide" id="inlineRadio2" value="0" checked="checked">
  <label class="form-check-label" for="inlineRadio2">Non</label>';
}




echo'
                            
  
</div>
</div>
                            </div>
                           
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label"></label>
                                <div class="col-lg-9">
                                    <input type="reset" class="btn btn-secondary" value="Annuler">
                                    <input type="button" class="btn btn-primary" name="submit" value="Sauvegarder la fiche">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 order-lg-1 text-center">
                <img src="//qualiscare.com/wp-content/uploads/2017/08/default-user.png" height="150px" class="mx-auto img-fluid img-circle d-block" alt="avatar">
                <h6 class="mt-2">'. $donnees['prenom'] . ' '. $donnees['nom'] .'</h6>
                <h7 class="mt-2">Lycée La Pléiade - '. $titre_site .'</h6>
            </div>
        </div>';

    } else{

      echo "<div class=\"alert alert-warning\" role=\"alert\">
      <h4 class=\"alert-heading\">Erreur <strong>#2</strong></h4>
      <p>Une erreur c'est produite ! L'utilisateur selectionné n'existe pas dans notre base</p>
      <hr>
      <p class=\"mb-0\"><a href=\"liste_classes.php\" class=\"alert-link\">Retourner au sélecteur de classe</a></p>
    </div>";
    }

    if (isset($_POST['submit'])) {
$email = stripslashes($_REQUEST['email']);
  //escapes special characters in a string
$email = mysqli_real_escape_string($con,$email);

$tel = stripslashes($_REQUEST['tel']);
  //escapes special characters in a string
$tel = mysqli_real_escape_string($con,$tel);

$password = stripslashes($_REQUEST['password']);
$password = md5($password);
$password = mysqli_real_escape_string($con,$password);

$valide = stripslashes($_REQUEST['valide']);
  //escapes special characters in a string
$valide = mysqli_real_escape_string($con,$valide);

    $actualisation_donnees= "UPDATE users SET valide='".$valide."', email='".$email."'' , tel='".$tel."', valide='".$valide."', password='".$password."'WHERE id = '". $_GET['id'] ."' ";
    $resultat_actualisation_donnees = mysqli_query($con,$actualisation_donnees) ;
    
   
      if ($con->query($query001) === TRUE) {
        echo "<div class=\"alert alert-success\" role=\"alert\">
        Envoi des données validé pour la fiche <b>#000".$_GET['id']."</b>
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
        </main>


        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <!--<script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery-slim.min.js"></script>')</script>-->
        <script src="assets/js/bootstrap.min.js"></script>
      </body>
    </html>
