<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "metode_saw";

$conn= mysqli_connect($host,$username,$password,$dbname);

if (!$conn) {
  die(mysqli_connect_error());
}
?>