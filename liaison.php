<?php

// Enter your Host, username, password, database below.

// I left password empty because i do not set password on localhost. 

$con = mysqli_connect("172.16.107.11:3306","","","sin_project");
$id="1";
// Check connection

if (mysqli_connect_error())

  {

  echo "Failed to connect to MySQL : " . mysqli_connect_error();

  }




$query = "SELECT * FROM `users` WHERE id='1'";
	$result = mysqli_query($con,$query) or die(mysql_error());


	$donnees = mysqli_fetch_array($result);

	
echo $donnees['numcarte'];

?> 
