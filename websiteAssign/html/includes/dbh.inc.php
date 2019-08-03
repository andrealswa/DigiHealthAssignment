<?php

$servername = "localhost";
$dBUsername = "dupon111_medical";
$dBPassword = "andrea";
$dBName = "dupon111_medical";

$conn = mysqli_connect($servername, $dBUsername, $dBPassword, $dBName);

if (!$conn) {
  die("Connection failed: ".mysqli_connect_error());
}

?>