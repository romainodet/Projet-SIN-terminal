<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    

    <title>Signin Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/signin.css" rel="stylesheet">
  </head>

  <body class="text-center">
  <?php

require('db.php');
session_start();
// If form submitted, insert values into the database.
if (isset($_POST['username'])){
        // removes backslashes
    $username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
	$username = mysqli_real_escape_string($con,$username);
	$password = stripslashes($_REQUEST['password']);
	
	$password = mysqli_real_escape_string($con,$password);
	
	
	//Checking is user existing in the database or not
        $query = "SELECT * FROM `users` WHERE email='$username'
and pass='$password'";
	$result = mysqli_query($con,$query) or die(mysql_error());


	$donnees = mysqli_fetch_array($result) ;

	


	$rows = mysqli_num_rows($result);
        if($rows==1){
	    $_SESSION['username'] = $username;
	    $_SESSION['utilisateur'] = $donnees;
            // Redirect user to index.php
	    header("Location: index.php");
         }else{
	echo "<div class='form'>
<h3>Username/password is incorrect.</h3>
<br/>Click here to <a href='login.php'>Login</a> -- <br>". $password  ."</div>";
	}
}  
?>
    <form class="form-signin" action="" method="post" name="login">
      <img class="mb-4" src="https://getbootstrap.com/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Connexion</h1>
      <label for="inputEmail" class="sr-only">Adresse E-mail</label>
      <input type="email" id="inputEmail" class="form-control" placeholder="Adresse Email" name="email" required autofocus>
      <label for="inputPassword" class="sr-only">Mot de passe</label>
      <input type="password" id="inputPassword" class="form-control" name ="password" placeholder="Mot de passe" required>
      
      <button class="btn btn-lg btn-primary btn-block" type="submit">Connexion...</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
    </form>
  </body>
</html>
