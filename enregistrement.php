<?php
$con = mysqli_connect("localhost","root","123","sin_project");
//$con = mysqli_connect("localhost","diffupack_sin","izitulo38230","diffupack_sin");
// Check connection
if (mysqli_connect_error())
  {
  echo "Failed to connect to MySQL : " . mysqli_connect_error();
  }

if(isset($_REQUEST['email'])){
  
  //$email = !empty($_REQUEST['email']) ? $_REQUEST['email'] : NULL;
  
  
        $email= stripslashes($_REQUEST['email']);
        //escapes special characters in a string

        echo $email;
	    //$email = mysqli_real_escape_string($con,$email); 
        
        $numcarte = stripslashes($_REQUEST['numcarte']);
        //escapes special characters in a string
        //$numcarte = mysqli_real_escape_string($con,$numcarte); 
        echo $numcarte;
        $categorie_users = stripslashes($_REQUEST['categorie_users']);
        //escapes special characters in a string
      //  $categorie_users = mysqli_real_escape_string($con,$categorie_users); 
		echo $categorie_users;
        $genre = stripslashes($_REQUEST['genre']);
       echo $genre;
	//$genre = mysqli_real_escape_string($con,$genre);

        $nom = stripslashes($_REQUEST['nom']);
        //escapes special characters in a string
        //$nom = mysqli_real_escape_string($con,$nom); 
echo $nom;
        $prenom = stripslashes($_REQUEST['prenom']);
        //escapes special characters in a string
        //$prenom = mysqli_real_escape_string($con,$prenom); 
echo $prenom;
        $datenaissance = stripslashes($_REQUEST['datenaissance']);
        //escapes special characters in a string
       // $datenaissance = mysqli_real_escape_string($con,$datenaissance); 
echo $datenaissance;
        $classe = stripslashes($_REQUEST['classe']);
        //escapes special characters in a string
        //$classe = mysqli_real_escape_string($con,$classe); 
echo $classe;
        $tel = stripslashes($_REQUEST['tel']);
        //escapes special characters in a string
        //$tel = mysqli_real_escape_string($con,$tel); 
echo $tel;
        $lundi_paire = stripslashes($_REQUEST['lundi_paire']);
        //escapes special characters in a string
        //$lundi_impaire = mysqli_real_escape_string($con,$lundi_impaire); 
echo $lundi_paire;
        $mardi_paire = stripslashes($_REQUEST['mardi_paire']);
        //escapes special characters in a string
        //$mardi_impaire = mysqli_real_escape_string($con,$mardi_impaire); 
echo $mardi_paire;
        $mercredi_paire = stripslashes($_REQUEST['mercredi_paire']);
        //escapes special characters in a string
       // $mercredi_paire = mysqli_real_escape_string($con,$mercredi_paire);
echo $mercredi_paire;
		$jeudi_paire = stripslashes($_REQUEST['jeudi_paire']);
echo $jeudi_paire;
		$vendredi_paire = stripslashes($_REQUEST['vendredi_paire']);
echo $vendredi_paire;
        $lundi_impaire = stripslashes($_REQUEST['lundi_impaire']);
        //escapes special characters in a string
        //$lundi_impaire = mysqli_real_escape_string($con,$lundi_impaire); 
echo $lundi_impaire;
        $mardi_impaire = stripslashes($_REQUEST['mardi_impaire']);
        //escapes special characters in a string
        //$mardi_impaire = mysqli_real_escape_string($con,$mardi_impaire); 
echo $mardi_impaire;
        $mercredi_impaire = stripslashes($_REQUEST['mercredi_impaire']);
        //escapes special characters in a string
       // $jf = mysqli_real_escape_string($con,$jf); 
echo $mercredi_impaire;
        $jeudi_impaire = stripslashes($_REQUEST['jeudi_impaire']);
        //escapes special characters in a string
       // $vd = mysqli_real_escape_string($con,$vd); 
echo $jeudi_impaire;
        $vendredi_impaire = stripslashes($_REQUEST['vendredi_impaire']);
        //escapes special characters in a string
       // $vf = mysqli_real_escape_string($con,$vf); 
echo $vendredi_impaire;
        $pass = stripslashes($_REQUEST['pass']);
        $pass = md5($pass);
       // $pass = mysqli_real_escape_string($con,$pass);
echo $pass;

       
        $query = 'INSERT INTO users(email, pass, numcarte, categorie_users, genre, nom, prenom, datenaissance, classe, tel, lundi_paire, mardi_paire,mercredi_paire,jeudi_paire,vendredi_paire vd, lundi_impaire, mardi_impaire, mercredi_impaire, jeudi_impaire, vendredi_impaire)
		VALUES("'.$email.', '.$pass.', '.$numcarte.','.$categorie_users.', '.$genre.', '.$nom.', '.$prenom.', '.$datenaissance.', '.$classe.', '.$tel.','.$lundi_paire.','.$mardi_paire.','.$mercredi_paire.','.$jeudi_paire.','.$vendredi_paire.','.$lundi_impaire.','.$mardi_impaire.','.$mercredi_impaire.','.$jeudi_impaire.','.$vendredi_impaire.')';
        $result = mysqli_query($con,$query);


        echo "Envoi OK";
        echo "<br>";
        echo "email : ". $_REQUEST['email']. " ok";
}else{

        echo "Erreur #1";
}
?>