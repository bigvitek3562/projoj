<?php

$servername = "localhost";
$dBUsername = "root";
$dbPassword = "";
$dBName = "foodnshit";
$dbPort=3306;

$conn = mysqli_connect($servername, $dBUsername, $dbPassword, $dbName, $dbPort);

if(!$conn){
  die("Connection failed: ".mysqli_connect_error());
}
