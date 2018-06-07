<?php
header('Content-type: text/html; charset=utf-8');
// Enter your Host, username, password, database below.
// I left password empty because i do not set password on localhost. 
$con = mysqli_connect("","","","");
// Check connection
if (mysqli_connect_error())
  {
  echo "Failed to connect to MySQL : " . mysqli_connect_error();
  }
?> 

 