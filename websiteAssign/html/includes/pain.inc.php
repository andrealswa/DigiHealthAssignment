<?php
session_start();

  require 'dbh.inc.php';

  $pain = $_POST['pInput'];
  $_SESSION['pain'] = $_POST['pInput'];
  $idUsers = $_SESSION['userId'];
  
  // $query = "UPDATE users SET pain='$pain' WHERE idUsers='$idUsers'";
  // $result = $conn->query($query);

  $query = "UPDATE users SET pain=? WHERE idUsers=?";
  $conn->prepare($query)->execute([$pain, $idUsers]);

  header("Location: ../patientdash.php");
?>
