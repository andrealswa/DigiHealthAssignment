<?php
  require 'header.php';
?>


<div class="padding">
  <div class="bg-primary overflow-hidden">
    <br><br>
    <h1 class="display-2 text-white text-center">My Health Record</h1>
    <div class="my-12 py-12">
      <div class="col-md-14 p-lg-5 mx-auto my-5">
        <li class="list-group-item bg-warning"></li>
        <div class="jumbotron">
          <div class="jumbotron">
            <p class="display-4 lead text-center">All of Your Health Data in One Space</p>
            <hr class="my-4">
            <ul class="list-group">
              <li class="list-group-item bg-success"></li>

              <li class="list-group-item">
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Your Physician: </span>
                  </div>
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <?php
                        require 'includes/dbh.inc.php';
                        echo "Dr. ";
                        echo $_SESSION['assignedDoctor'];
                      ?>
                    </span>
                  </div>
                </div>
              </li>



              <li class="list-group-item">
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Height: </span>
                  </div>
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <?php
                        require 'includes/dbh.inc.php';
                        echo $_SESSION['uheight'];
                        echo " cm";
                      ?>
                    </span>
                  </div>
                </div>
              </li>

              <li class="list-group-item">
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Weight: </span>
                  </div>
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <?php
                        require 'includes/dbh.inc.php';
                        echo $_SESSION['uweight'];
                        echo " kg";
                      ?>
                    </span>
                  </div>
                </div>
              </li>

              <li class="list-group-item">
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Diagnosis: </span>
                  </div>
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <?php
                        require 'includes/dbh.inc.php';
                        echo $_SESSION['diagnosis'];
                      ?>
                    </span>
                  </div>
                </div>
              </li>

              <li class="list-group-item">
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Medication: </span>
                  </div>
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <?php
                        require 'includes/dbh.inc.php';
                        echo $_SESSION['medication'];
                      ?>
                    </span>
                  </div>
                </div>
              </li>

              <li class="list-group-item">
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Current Quality Care: </span>
                  </div>
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <?php
                        require 'includes/dbh.inc.php';
                        echo $_SESSION['careQuality'];
                      ?>
                    </span>
                  </div>
                </div>
              </li>

              <li class="list-group-item">
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Current Pain Level: </span>
                  </div>
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <?php
                        require 'includes/dbh.inc.php';
                        echo $_SESSION['pain'];
                      ?>
                    </span>
                  </div>
                </div>
              </li>

              <li class="list-group-item bg-success"></li>
            </ul>
          </div>

        </div>
      </div>
    </div>

    <div class="padding">

      <li class="list-group-item bg-warning"></li>
      <div class="jumbotron padding">
        <h1 class="display-4">Quality of Care Survey</h1>
        <p class="lead">Please tell us how you feel about the current quality of your care</p>
        <hr class="my-4">

        <form action="includes/care.inc.php" method="post">
            <div class="form-group">
              <label>Select Your Current Care Quality</label>
              <select class="form-control" name="cInput">
                <option>Excellent</option>
                <option>Good</option>
                <option>Satisfactory</option>
                <option>Poor</option>
              </select>
            </div>
            <button type="submit" name="cSubmit" class="btn btn-primary btn-lg">Send My Feedback</button>
          </form>
      </div>

      <br>

      <li class="list-group-item bg-warning"></li>
      <div class="jumbotron padding">
        <h1 class="display-4">Change Pain Level</h1>
        <p class="lead">Change your pain level to what you currently feel so your healthcare team can better manage your condition</p>
        <hr class="my-4">
        

        <form action="includes/pain.inc.php" method="post">
          <div class="form-group">
            <label>Select Your Pain Level</label>
            <small id="emailHelp" class="form-text text-muted">0 Is Pain Free and 5 Is the Most Pain You Have Ever Felt</small>
            <select class="form-control" name="pInput">
              <option>0</option>
              <option>1</option>
              <option>2</option>
              <option>3</option>
              <option>4</option>
              <option>5</option>
            </select>
          </div>
          <button type="submit" name="pSubmit" class="btn btn-primary btn-lg">Update My Pain Level</button>
        </form>
      </div>

      <br>

      <li class="list-group-item bg-warning"></li>
      <div class="jumbotron padding">
        <h1 class="display-4">Update Weight</h1>
        <p class="lead">If your weight has changed you may update it to help your healthcare team better manage your care</p>
        <hr class="my-4">
        
        <form action="includes/weightupdate.inc.php" method="post">
          <div class="form-group">
            <label>Your Current Weight (kg)</label>
            <input type="text" name="wInput" class="form-control" placeholder="Weight">
          </div>
          <button type="submit" name="wSubmit" class="btn btn-primary btn-lg">Update My Weight</button>
        </form>
      <div>

      <br>

    </div>


  </div>
</div>

<?php
  require 'footer.php';
?>
