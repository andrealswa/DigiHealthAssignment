<?php
require 'includes/dbh.inc.php';
echo '
  <div class="padding">
    <br>

    <li class="list-group-item bg-warning"></li>
    <div class="jumbotron padding">
      <h1 class="display-4">Change Working Hours</h1>
      <p class="lead">My Current Weekly Hospital Work Hours: ';
        echo $_SESSION['workHours'];
        echo '
      </p>
      <hr class="my-4">
      <form action="includes/workHoursN.inc.php" method="post">
        <div class="form-group">
          <label>Enter Your Desired Work Hours</label>
          <input type="text" name="whInput" class="form-control" placeholder="My Desired Hours of Work per Week">
        </div>
        <button type="submit" name="pSubmit" class="btn btn-primary btn-lg">Update My Hospital Work Hours</button>
      </form>
    </div>
  </div>
  <br>
';

?>