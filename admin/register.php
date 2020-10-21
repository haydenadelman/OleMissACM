<?php

session_start();
if (!isset($_SESSION['username'])) {
  header("Location:login.php");
} elseif ($_SESSION['role'] != "admin") {
  header("Location:index.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <title>Register</title>

</head>

<body>

  <?php if (isset($_REQUEST['error'])) { ?>
    <!-- Error Alerts-->
    <div class="text-center">
      <span class="alert alert-danger"><?php echo $_REQUEST['error']; ?></span>
    </div>
  <?php } ?>
  <?php if (isset($_REQUEST['success'])) { ?>
    <!-- Error Alerts-->
    <div class="text-center">
      <span class="alert alert-success"><?php echo $_REQUEST['success']; ?></span>
    </div>
  <?php } ?>

  <hr>

  <!-- register-->
  <div id="register">
    <form class="user" name="form-register" action="registerform.php" method="POST">
      <div class="form-group">
        <input type="email" name="username" id="username" aria-describedby="emailHelp" placeholder="New Email Address...">
      </div>
      <div class="form-group">
        <input type="password" name="password" id="password" placeholder="Password">
      </div>
      <div class="form-group">
        <input type="password" name="repassword" id="repassword" placeholder="Re-Enter Password">
      </div>
      <div class="form-group">
        <input list="role" class="form-control form-control-user" name="role" placeholder="Choose account role">
        <datalist id='role'>
          <option value="admin"></option>
          <option value="user"></option>
        </datalist>
      </div>
      <div class="form-group">
        <input type="submit" name="register" value="Register">
      </div>
    </form>
  </div>
  <hr>
  <a href="users.php">
    Return to dashboard
  </a>

</body>

</html>