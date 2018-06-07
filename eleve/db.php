<?php
header('Content-type: text/html; charset=utf-8');
// Enter your Host, username, password, database below.
// I left password empty because i do not set password on localhost. 
$con = mysqli_connect("172.16.107.11:3306","","","sin_project");
// Check connection
if (mysqli_connect_error())
  {
  echo "Failed to connect to MySQL : " . mysqli_connect_error();
  }
?> 

 