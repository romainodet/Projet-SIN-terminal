    <?php
setlocale (LC_ALL, 'fr_FR.utf8','fra'); 
    $titre_page="Mon compte";
    //include auth.php file on all secure pages
    include("auth.php");
    require("db.php");
	
	//$donnees_eleve_test=$_SESSION['utilisateur'];
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
        <li class="breadcrumb-item active" aria-current="page"><?php echo $_SESSION['id'] .' '.$titre_page?></li>
      </ol>
    </nav>
    <?php
    $reponse = $con->query('SELECT u.id, u.categorie_users, u.genre, u.nom, u.prenom, m.id_message, m.sujet, m.message, m.etat, m.date_time FROM users AS u, messages AS m WHERE m.id_expediteur=u.id AND m.id_destinataire='.$donnees_users['id'].'');
            
    


           
    //$donnees_users_passages = mysqli_fetch_array($reponse_passages);
    ?>

    <h1><?php echo $titre_page?></h1>
	<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;border-color:#aaa;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#aaa;color:#333;background-color:#fff;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#aaa;color:#fff;background-color:#f38630;}
.tg .tg-yw4l{vertical-align:top}
</style>
<table class="tg">
  <tr>
    <th class="tg-yw4l">id</th>
    <th class="tg-yw4l">expediteur<br></th>
    <th class="tg-yw4l">sujet</th>
    <th class="tg-yw4l">messages</th>
    <th class="tg-yw4l">date</th>
	<th class="tg-yw4l">etat</th>
  </tr>
  <tr>
   
    <?php
	
	 $reponse = $con->query('SELECT u.id, u.categorie_users, u.genre, u.nom, u.prenom, m.id_message, m.sujet, m.message, m.etat, m.date_time FROM users AS u, messages AS m WHERE m.id_expediteur=u.id AND m.id_destinataire='.$_SESSION['id'].'');
            
  
	
while ($donnees_users = mysqli_fetch_array($reponse)){
echo '<td class="tg-yw4l">'.$donnees_users['id_message'].'</td>';
echo '<td class="tg-yw4l">'.$donnees_users['nom'].' '.$donnees_users['prenom'] .'</td>';
echo '<td class="tg-yw4l">'.$donnees_users['sujet'].'</td>';
echo '<td class="tg-yw4l">'.$donnees_users['message'].'</td>';
$timestamp = strtotime($donnees_users['date_time']);
                     
echo '<td class="tg-yw4l">'. date('d/m/Y - H:i:s', $timestamp) .'</td>';
echo '<td class="tg-yw4l">'.$donnees_users['etat'].'</td>';
echo '</tr>';
}
   
    ?>
</table>
        </main>


        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <!--<script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery-slim.min.js"></script>')</script>-->
        <script src="assets/js/bootstrap.min.js"></script>
      </body>
    </html>
