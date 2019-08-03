<?php
  require 'includes/dbh.inc.php';

  // Delete Functionality
  if (isset($_POST['delete'])  && isset($_POST['deleteBox']) )
  {
    $_POST['deleteBox'];

    foreach($_POST['deleteBox'] as $key=>$idUsers) {
      // Simple delete box, no need for placeholders here.
      $query  = "DELETE FROM users WHERE idUsers='$idUsers'";
      $result = $conn->query($query);

      if (!$result) echo "DELETE failed: $query<br>" .
        $conn->error."<br><br>";
    }
  }
 
  // Update Functionality
  if (isset($_POST['update'])  && isset($_POST['deleteBox']) )
  {
    $_POST['deleteBox'];

    $height = $_POST['height'];
    $weight = $_POST['weight'];
    $diagnosis = $_POST['diagnosis'];
    $medication = $_POST['medication'];

    foreach($_POST['deleteBox'] as $key=>$idUsers) { 
      $query  = "UPDATE users
        SET uheight='$height', uweight='$weight', 
        diagnosis='$diagnosis', medication='$medication'
        WHERE idUsers='$idUsers'";

      $result = $conn->query($query);

      if (!$result) echo "UPDATE failed: $query<br>" .
        $conn->error."<br><br>";
    }
  }



  // Update Height, Weight, Diagnosis, Medication.

  // Table of all users for Delete and Update functionality

  if (strpos($_SESSION['userType'], 'Doctor') !== false) {
    // Provide Doctor Authorized Data no need for placeholders here.
    $query  = "SELECT * FROM users";
  }
  else {
    // Provide Nurse Authorized Data 
    $query  = "SELECT * FROM users WHERE uidType='Patient'";
  }

  
  $result = $conn->query($query);
  if (!$result) die ("Database usertable.php access failed: " . $conn->error);
  
  $rows = $result->num_rows;


echo <<<_END
  <form action="phydash.php" method="post">

    <br>
    <br>

    <label for="basic-url">Height (cm)</label>
    <input type="text" class="form-control" name="height">

    <label for="basic-url">Weight (kg)</label>
    <input type="text" class="form-control" name="weight">

    <label for="basic-url">Diagnosis</label>
    <input type="text" class="form-control" name="diagnosis">

    <label for="basic-url">Medication</label>
    <input type="text" class="form-control" name="medication">

    <br>

    <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
      <div class="btn-group mr-2" role="group" aria-label="First group">
        <input type="submit" name="update" class="btn btn-primary btn-lg" value="Update Selected User">
      </div>
      <div class="btn-group mr-2" role="group" aria-label="Second group">
        <input type="submit" name="delete" class="btn btn-primary btn-lg" value="Delete Selected User">
      </div>
    </div>
    <div class="card-deck">
    <div class="card">
  
    <br>
    <table class="table">
      <thead>
        <th scope="col">Index           </th>
        <th scope="col">User ID         </th>
        <th scope="col">User Email      </th>
        <th scope="col">User Type       </th>
        <th scope="col">Height (cm)     </th>
        <th scope="col">Weight (kg)     </th>
        <th scope="col">Diagnosis       </th>
        <th scope="col">Medication      </th>
        <th scope="col">Assigned Doctor </th>
      </thead>
    <tbody>
    
    <br>
_END;
  for ($j = 0 ; $j < $rows ; ++$j)
  {
    $result->data_seek($j);
    $row = $result->fetch_array(MYSQLI_NUM);
echo <<<_END
    <tr>
      <td>$row[0]</td>
      <td>$row[1]</td>
      <td>$row[2]</td>
      <td>$row[4]</td>
      <td>$row[5]</td>
      <td>$row[6]</td>
      <td>$row[7]</td>
      <td>$row[8]</td>
      <td>$row[9]</td>
      <td><input type="checkbox" name='deleteBox[]' value='$row[0]'></td>
    </tr>
_END;
  }
 
echo <<<_END
  </tbody>
  </table>
  </form>
_END;
  $result->close();
  $conn->close();

  function get_post($conn, $var)
  {
    return $conn->real_escape_string($_POST[$var]);
  }

  echo '</div>
  </div>';
?>
