<?php
// Check to see if user got here without chaning the html itself
if (isset($_POST['signup-submit'])) {
  // Connect to the database
  require 'dbh.inc.php';

  // Get user information
  $username = $_POST['uid'];
  $email = $_POST['email'];
  $password = $_POST['pwd'];
  $passwordRepeat = $_POST['pwd-repeat'];
  $usertype = $_POST['uidtype'];

  // Check to ensure that the user actually inputs data
  if (empty($username) || empty($email) || empty($password) || empty($passwordRepeat)) {
    header("Location: ../signup.php?error=emptyfields&uid=".$username."&email=".$email);
    exit();
  }

  // Error handling:
  // Email and Password incorrect
  else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) {
    header("Location: ../signup.php?error=invalidemailuid");
    // send back neither the username nor password
    exit();
  }

  // Email incorrect
  else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location: ../signup.php?error=invalidemail&uid=".$username);
    // send back username as being good
    exit();
  }

  // Username incorrect
  else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
    header("Location: ../signup.php?error=invaliduid&email=".$email);
    // send back email as being good
    exit();
  }
  else if ($password !== $passwordRepeat) {
    header("Location: ../signup.php?error=passwordRepeatCheck&email=".$email."&uid=".$username);
    exit();
  }
  else {
    // Connect to database and make sure there are no matching users in the database
    // Use placeholders to protect the database from malicious users
    $sql = "SELECT uidUsers FROM users WHERE uidUsers=?";
    // Run our database connection.
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("Location: ../signup.php?error=mysqlierror");
      // send back error message
      exit();
    }
    else {
      // s string, b boolean, i integer
      // passing one string
      mysqli_stmt_bind_param($stmt, "s", $username);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_store_result($stmt);
      $resultCheck = mysqli_stmt_num_rows($stmt);
      if ($resultCheck > 0) {
        header("Location: ../signup.php?error=usertaken&email=".$email);
        // send back email
        exit();
      }
      else {
        // Insert into raw database columns
        // Insertion preparation
        $sql = "INSERT INTO users (uidUsers, emailUsers, pwdUsers, uidType) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_stmt_init($conn);
        
        if (!mysqli_stmt_prepare($stmt, $sql)) {
          header("Location: ../signup.php?error=mysqlierror");
          exit();
        }
        else {
          // Modern hashing method that is safe to use
          $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

          // Inserting info into the database
          mysqli_stmt_bind_param($stmt, "ssss", $username, $email, $hashedPwd, $usertype);
          mysqli_stmt_execute($stmt);

          header("Location: ../signup.php?signup=success");
          exit();
        }
      }
    }
  }
  // Close the database connection
  mysqli_stmt_close($stmt);
  mysqli_close($conn);
}
else {
  // Send user back to signup page if they are trying to access without button
  header("Location: ../signup.php");
  exit();
}

?>
