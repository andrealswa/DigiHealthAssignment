<?php
session_start();

  require 'dbh.inc.php';

  $careQuality = $_POST['cInput'];
  $_SESSION['careQuality'] = $_POST['cInput'];
  $idUsers = $_SESSION['userId'];
  
  // $query = "UPDATE users SET careQuality='$careQuality' WHERE idUsers='$idUsers'";
  // $result = $conn->query($query);

  $query = "UPDATE users SET careQuality=? WHERE idUsers=?";
  $conn->prepare($query)->execute([$careQuality, $idUsers]);

  header("Location: ../patientdash.php");
?>
