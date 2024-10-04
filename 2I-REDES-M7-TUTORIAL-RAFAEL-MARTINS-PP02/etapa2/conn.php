<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "14356-m7-tutorial";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
