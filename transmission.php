<?php
// connection a la bdd
try
{
	$bdd = new PDO('mysql:host=172.16.107.11;dbname=test;charset=utf8', '', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}




$req = $bdd->prepare('INSERT INTO bgproject(nom) VALUES(:nom)');

$req->execute(array(

    'nom' => $_GET['carte']

	
    ));




echo 'bravo !';
?>