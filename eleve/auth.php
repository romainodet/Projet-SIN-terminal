
<?php


session_start();
if(!isset($_SESSION["username"])){
header("Location: login.php");
exit(); }
//$userid=$_SESSION['utilisateurid'];


$donnees_users = $_SESSION['utilisateur'];


?> 