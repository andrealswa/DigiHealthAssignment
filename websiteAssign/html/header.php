<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  
  <!-- Using the Bootstrap 4 framework -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="../js/scroll.js"></script>

  
  <!-- My customized Bootstrap -->
  <link rel="stylesheet" href="../css/bootstrap.css">
  <title>Hospital Medical Record System</title>
</head>

<body>

  <nav class="navbar navbar-dark bg-dark navbar-expand-lg">
    <a class="navbar-brand" href="index.php">Hospital Management System</a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      
      <ul class="navbar-nav mr-auto">

        <?php
        if (isset($_SESSION['userId']) == true && strpos($_SESSION['userType'], 'Doctor') !== false) {
          // User is logged in as a Doctor
          echo '
            <li class="nav-item">
              <a class="nav-link" href="phydash.php">Physician Dashboard</a>
            </li>
          ';
        }
        else if (isset($_SESSION['userId']) == true && strpos($_SESSION['userType'], 'Nurse') !== false) {
          // User is logged in as a Nurse
          echo '
            <li class="nav-item">
              <a class="nav-link" href="nursedash.php">Nurse Dashboard</a>
            </li>
          ';
        }
        else if (isset($_SESSION['userId']) == true && strpos($_SESSION['userType'], 'Patient') !== false) {
          // User is logged in as a Patient
          echo '
            <li class="nav-item">
              <a class="nav-link" href="patientdash.php">My Health Record</a>
            </li>
          ';
        } else {
          echo '
            <li class="nav-item">
              <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="features.php">Features</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="signup.php">Signup</a>
            </li>
          ';
        }
        ?>
      </ul>


      <div>
        <?php
          // Check to see if session variables are present
          if (isset($_SESSION['userId'])) {
            // User is logged in
            $userDisplayName = $_SESSION['userType'];
            echo '
              <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                <div class="btn-group mr-1" role="group">
                  <form class="padding-login" action="includes/logout.inc.php" method="post">
                    <a class="navbar-brand text-white">';
                      echo $_SESSION['userUid'];
                      echo '
                    </a>
                  </form>
                </div>
                <div class="btn-group mr-1" role="group">
                  <p></p>
                </div>
                <div class="btn-group mr-1" role="group">
                  <p></p>
                </div>
                <div class="btn-group mr-1" role="group">
                  <p></p>
                </div>
                <div class="btn-group mr-1" role="group">
                  <p></p>
                </div>
                <div class="btn-group mr-1" role="group">
                  <form class="padding-login" action="includes/logout.inc.php" method="post">
                    <button type="submit" name="logout-submit" class="btn btn-primary">Logout</button>
                  </form>
                </div>
              </div>
              
            ';
          }
          else {
            // User is logged out
            echo '
              <form action="includes/login.inc.php" method="post">
                <div class="form-row">
                  <div class="col">
                    <input type="text" name="mailuid" class="form-control" placeholder="Username">
                  </div>
                  <div class="col">
                    <input type="password" name="pwd" class="form-control" placeholder="Password">
                  </div>
                  <div class="col">
                    <button type="submit" name="login-submit" class="btn btn-light">Login</button>
                  </div>
                </div>
              </form>
            ';
          }
        ?>
      </div>


    </div>

  </nav>
  <!-- End of navigation-->