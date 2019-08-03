<?php
  require 'header.php';
?>

  <div class="padding">
    <div class="bg-primary text-center text-white overflow-hidden">
      <div class="my-2 py-2">

        <div class="col-md-8 p-lg-5 mx-auto my-5">
          <h1 class="display-4 font-weight-normal">Signup Today</h1>
          <p class="lead font-weight-normal">Transform the way your healthcare insitution administers care with a fast and secure digital administration and records system.</p>
        </div>
        
      </div>
    </div>
  </div>

  <br>

  <main>
    <div class="wrapper-main">
      <section class="section-default">

        <div class="padding">
          <div class="jumbotron">
              <form action="includes/signup.inc.php" method="post">

                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label>Username</label>
                    <input type="text" name="uid" class="form-control" placeholder="Username">
                  </div>
                  <div class="form-group col-md-6">
                    <label>Email</label>
                    <input type="text" name="email" class="form-control" placeholder="Email">
                  </div>
                </div>

                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label>Password</label>
                    <input type="password" name="pwd" class="form-control" placeholder="Password" >
                  </div>
                  <div class="form-group col-md-6">
                    <label>Repeat Password</label>
                    <input type="password" name="pwd-repeat" class="form-control" placeholder="Repeat Password">
                  </div>
                </div>

                <div class="form-group">
                  <label>User Type</label>
                  <select class="form-control" name="uidtype">
                    <option>Doctor</option>
                    <option>Nurse</option>
                    <option>Patient</option>
                  </select>
                </div>

                <button type="submit" name="signup-submit" class="btn btn-primary">Signup</button>
              </form>

              <?php
                if (issset($_GET['error'])) {
                  if ($_GET['error'] == 'emptyfields') {
                    echo '<p>Fill in all of the signup fields</p>';
                  }
                  else if ($_GET['error'] == "invalidmail") {
                    echo '<p>Invalid mail</p>';
                  }
                }
                else if ($_GET['signup'] == "success") {
                  echo '<p>Signup Successful</p>';
                }
              ?>

          </div>
        </div>
      </section>
    </div>
  </main>

<?php
  require 'footer.php';
?>
