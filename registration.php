<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Registration</title>
<link rel="stylesheet" href="assets/assets/css/style.css" /> 
</head>
<body>
<?php
require('db.php');
// If form submitted, insert values into the database.

	
$categorie_users=0;
$pass=0;
$numcarte=0;
$nom=0;
$prenom=0;
$datenaissance=0;
$classe=0;
$tel=0;
$email;
$ld=0;
$lf=0;
$md=0;
$mf=0;
$jd=0;
$jf=0;
$vd=0;
$vf=0;
if (isset($_REQUEST['email'])){

	$email= stripslashes($_REQUEST['email']);
        //escapes special characters in a string
	$email = mysqli_real_escape_string($con,$email); 
        
        $numcarte = stripslashes($_REQUEST['numcarte']);
        //escapes special characters in a string
        $numcarte = mysqli_real_escape_string($con,$numcarte); 
        
         $categorie_users = stripslashes($_REQUEST['categorie_users']);
        //escapes special characters in a string
        $categorie_users = mysqli_real_escape_string($con,$categorie_users); 

        $genre = stripslashes($_REQUEST['genre']);
		$genre = mysqli_real_escape_string($con,$genre);

        $nom = stripslashes($_REQUEST['nom']);
        //escapes special characters in a string
        $nom = mysqli_real_escape_string($con,$nom); 

        $prenom = stripslashes($_REQUEST['prenom']);
        //escapes special characters in a string
        $prenom = mysqli_real_escape_string($con,$prenom); 

        $datenaissance = stripslashes($_REQUEST['datenaissance']);
        //escapes special characters in a string
        $datenaissance = mysqli_real_escape_string($con,$datenaissance); 

        $classe = stripslashes($_REQUEST['classe']);
        //escapes special characters in a string
        $classe = mysqli_real_escape_string($con,$classe); 

        $tel = stripslashes($_REQUEST['tel']);
        //escapes special characters in a string
        $tel = mysqli_real_escape_string($con,$tel); 


		$lundi_paire = stripslashes($_REQUEST['lundi_paire']);
        //escapes special characters in a string
        $lundi_paire = mysqli_real_escape_string($con,$lundi_paire); 

        $mardi_paire = stripslashes($_REQUEST['mardi_paire']);
        //escapes special characters in a string
        $mardi_paire = mysqli_real_escape_string($con,$mardi_paire); 

        $mercredi_paire = stripslashes($_REQUEST['mercredi_paire']);
        //escapes special characters in a string
		$mercredi_paire = mysqli_real_escape_string($con,$mercredi_paire);
	   
	   
		$jeudi_paire = stripslashes($_REQUEST['jeudi_paire']);
		$jeudi_paire = mysqli_real_escape_string($con,$jeudi_paire);
		
		
		$vendredi_paire = stripslashes($_REQUEST['vendredi_paire']);
		$vendredi_paire = mysqli_real_escape_string($con,$vendredi_paire);


        $lundi_impaire = stripslashes($_REQUEST['lundi_impaire']);
        //escapes special characters in a string
        $lundi_impaire = mysqli_real_escape_string($con,$lundi_impaire); 

        $mardi_impaire = stripslashes($_REQUEST['mardi_impaire']);
        //escapes special characters in a string
        $mardi_impaire = mysqli_real_escape_string($con,$mardi_impaire); 

        $mercredi_impaire = stripslashes($_REQUEST['mercredi_impaire']);
        //escapes special characters in a string
       $mercredi_impaire = mysqli_real_escape_string($con,$mercredi_impaire); 

        $jeudi_impaire = stripslashes($_REQUEST['jeudi_impaire']);
        //escapes special characters in a string
        $jeudi_impaire = mysqli_real_escape_string($con,$jeudi_impaire); 

        $vendredi_impaire = stripslashes($_REQUEST['vendredi_impaire']);
		$vendredi_impaire = mysqli_real_escape_string($con,$vendredi_impaire); 


        $pass = stripslashes(md5($_REQUEST['pass']));
		$pass = mysqli_real_escape_string($con,$pass);
	
        $query = "INSERT into 'users' (categorie_users, pass, numcarte,genre, nom, prenom, datenaissance, classe, tel, email, lundi_paire, mardi_paire,mercredi_paire, jeudi_paire, vendredi_paire, lundi_impaire, mardi_impaire, mercredi_impaire, jeudi_impaire,vendredi_impaire )
		VALUES ('$categorie_users','$pass','$numcarte','$genre', '$nom','$prenom','$datenaissance','$classe','$tel','$email','$lundi_paire','$mardi_paire','$mercredi_paire','$jeudi_paire','$vendredi_paire','$lundi_impaire','$mardi_impaire','$mercredi_impaire','$jeudi_impaire','$vendredi_impaire')";
        $result = mysqli_query($con,$query);
        if($result){
        echo "<div class='form'>
		<h3>You are registered successfully.</h3>
		<br/>Click here to <a href='login.php'>Login</a></div> ";
        }
    }else{
?>
<div class="form">
<h1>Registration</h1>
<form name="registration" action="" method="post">
<input type="text" name="username" placeholder="Username" required />
<input type="password" name="password" placeholder="Password" required />
<input type="submit" name="submit" value="Register" />
</form>
</div>
<?php } ?>
</body>
</html>