<?php

$servername = "localhost";
$dBUsername = "root";
$dbPassword = "";
$dBName = "foodnshit";

$conn = mysqli_connect($servername, $dBUsername, $dbPassword, $dbName);

if(!$conn){
  die("Connection failed: ".mysqli_connect_error());
}
