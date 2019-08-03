<?php
session_start();

  require 'dbh.inc.php';

  $uweightInput = $_POST['wInput'];
  $_SESSION['uweight'] = $_POST['wInput'];
  $idUsers = $_SESSION['userId'];
  
  // $query = "UPDATE users SET uweight='$uweightInput' WHERE idUsers='$idUsers'";
  // $result = $conn->query($query);

  $query = "UPDATE users SET uweight=? WHERE idUsers=?";
  $conn->prepare($query)->execute([$uweight, $idUsers]);

  header("Location: ../patientdash.php");
?>
