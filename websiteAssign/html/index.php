<?php
  require 'header.php';
?>

  <div class="padding">
    <div class="bg-primary text-center text-white overflow-hidden">
      <div class="my-2 py-2">
        <div class="col-md-8 p-lg-5 mx-auto my-5">
          <h1 class="display-4 font-weight-normal">Digital Healthcare System</h1>
          <p class="lead font-weight-normal">Transform the way your healthcare institution administers care with a fast and secure digital administration and records system.</p>
          <br>
          <div class="form-row">
            <div class="col">


              <?php
                if (isset($_SESSION['userId']) == true && strpos($_SESSION['userType'], 'Doctor') !== false) {
                  // User is logged in as a Doctor
                  echo '
                    <h1>Welcome Doctor!</h1>
                  ';
                }
                else if (isset($_SESSION['userId']) == true && strpos($_SESSION['userType'], 'Nurse') !== false) {
                  // User is logged in as a Doctor
                  echo '
                    <h1>Welcome Nurse!</h1>
                  ';
                }
                else if (isset($_SESSION['userId']) == true && strpos($_SESSION['userType'], 'Patient') !== false) {
                  // User is logged in
                  echo '
                    <h1>Welcome Patient!</h1>
                  ';
                } else {
                  echo '
                  <a href="signup.php">
                    <button type="submit" name="login-submit" class="btn btn-light btn-lg">Signup</button>
                  </a>
                  ';
                }
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <br>

  <?php
    if (isset($_SESSION['userId']) == true && strpos($_SESSION['userType'], 'Doctor') !== false) {
      // User is logged in as a Doctor
      echo '
      <!-- Jumbotron with learn more features button -->
      <div class="padding">
        <div class="jumbotron">
          <h1 class="display-4">Hello Doctor!</h1>
          <p class="lead">Access your Dashboard to manage all users for your hospital</p>
          <hr class="my-4">
          <a class="btn btn-success btn-lg" href="phydash.php" role="button">Access The Physician Dashboard</a>
        </div>
      </div>

      <div class="padding">
      <div class="bg-primary padding-login">
      <br>
      <!-- Jumbotron with learn more features button -->
      ';
    }
    else if (isset($_SESSION['userId']) == true && strpos($_SESSION['userType'], 'Nurse') !== false) {
      // User is logged in as a Doctor
      echo '
      <!-- Jumbotron with learn more features button -->
      <div class="padding">
        <div class="jumbotron">
          <h1 class="display-4">Hello Nurse!</h1>
          <p class="lead">Manage Patients and View All Relevant Patient Information on Your Dashboard</p>
          <hr class="my-4">
          <a class="btn btn-success btn-lg" href="nursedash.php" role="button">Access The Nurse Dashboard</a>
        </div>
      </div>

      <div class="padding">
      <div class="bg-primary padding-login">
      <br>
      <!-- Jumbotron with learn more features button -->
      ';
    }
    else if (isset($_SESSION['userId']) == true && strpos($_SESSION['userType'], 'Patient') !== false) {
      // User is logged in
      echo '
      <!-- Jumbotron with learn more features button -->
      <div class="padding">
        <div class="jumbotron">
          <h1 class="display-4">Welcome!</h1>
          <p class="lead">To Provide You the Best Care Possible You May Securely and Conveniently Access to All of Your Health Information Anywhere</p>
          <hr class="my-4">
          <a class="btn btn-success btn-lg" href="patientdash.php" role="button">Access Your Digital Health Record</a>
        </div>
      </div>

      <div class="padding">
      <div class="bg-primary padding-login">
      <br>
      <!-- Jumbotron with learn more features button -->
      ';
    } else {
      echo '
      <!-- Jumbotron with learn more features button -->
      <div class="padding">
        <div class="jumbotron">
          <h1 class="display-4">Register and Login as a Doctor, Nurse or Patient</h1>
          <p class="lead">Transform the Way You Practice Healthcare with Digital Hospital Administration</p>
          <hr class="my-4">
          <a class="btn btn-primary btn-lg" href="features.php" role="button">Learn More About Our Features</a>
        </div>
      </div>

      <div class="padding">
      <div class="bg-primary padding-login">
      <br>
      <!-- Jumbotron with learn more features button -->
      ';
    }
  ?>


  


  <?php
  // Check to see if session variables are present.
  if (isset($_SESSION['userId'])) {
    // Logged in
    echo '
    ';
  }
  else {
    // Logged out
    echo '
    <div class="padding-login">
        <div class="jumbotron">
          <div class="padding-login">

            <form action="includes/login.inc.php" method="post">
              <h1>Login</h1>
              <br>
              <div class="form-group">
                <label>Username</label>
                <input type="text" name="mailuid" class="form-control">
              </div>
              <div class="form-group">
                <label>Password</label>
                <input type="password" name="pwd" class="form-control">
              </div>

              <div class="form-row">
                <div class="col">
                  <button type="submit" name="login-submit" class="btn btn-primary">Login</button>
                </div>
              </div>

            </form>

          </div>
        </div>
      </div>
    ';
  }  
  ?>


  </div>
  </div>

  <!-- End of user login form -->

  <!-- Choices on what to login with -->
  <div class="padding">
    <div class="card-deck">
      <div class="card">
        <img src="../pictures/loginex1.jpg" class="card-img-top" alt="Doctor with clipboard">
        <div class="card-body">
          <h5 class="card-title">Doctor</h5>
          <p class="card-text">Username: DrBell</p>
          <p class="card-text">Password: 123</p>
        </div>
        <div class="card-footer">
          <br>
        </div>
      </div>
      <div class="card">
        <img src="../pictures/loginex2.jpg" class="card-img-top" alt="Nurse with image">
        <div class="card-body">
          <h5 class="card-title">Nurse</h5>
          <p class="card-text">Username: NurseRice</p>
          <p class="card-text">Password: 123</p>
        </div>
        <div class="card-footer">
          <br>
        </div>
      </div>
      <div class="card">
        <img src="../pictures/loginex3.jpg" class="card-img-top" alt="Patient in bed">
        <div class="card-body">
          <h5 class="card-title">Patient</h5>
          <p class="card-text">Username: ZohaHolder</p>
          <p class="card-text">Password: 123</p>
        </div>
        <div class="card-footer">
          <br>
        </div>
      </div>
    </div>
  </div>

<?php
  require 'footer.php';
?>