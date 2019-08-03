<?php
session_start();

  require 'dbh.inc.php';

  $workHours = $_POST['whInput'];
  $_SESSION['workHours'] = $_POST['whInput'];
  $idUsers = $_SESSION['userId'];
  
  // $query = "UPDATE users SET workHours='$workHours' WHERE idUsers='$idUsers'";
  // $result = $conn->query($query);

  $query = "UPDATE users SET workHours=? WHERE idUsers=?";
  $conn->prepare($query)->execute([$workHours, $idUsers]);


  header("Location: ../phydash.php");
?>


