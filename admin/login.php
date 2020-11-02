<?php

session_start();

include 'includes/scripts.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <title>Login</title>
  <meta charset="utf-8">
  <link href="css/loginstyle.css" rel="stylesheet" type="text/css">

</head>


<body>

  <?php if (isset($_REQUEST['error'])) { ?>
    <!-- Error Alerts-->
    <div class="text-center">
      <span class="alert alert-danger"><?php echo $_REQUEST['error']; ?></span>
    </div>
  <?php } ?>

  <!-- Login -->
  <div class="login">
    <form class="user" name="form-login" action="loginform.php?op=in" method="POST">
      <h1>Welcome!</h1>
      <div class="form-group">
        <i class="fa fa-user" aria-hidden="true"></i>
        <input type="email" name="username" id="email" class="form-control" placeholder="Enter Email Address...">
      </div>
      <div class="form-group">
        <i class="fa fa-lock" aria-hidden="true"></i>
        <input type="password" name="password" id="password" class="form-control" placeholder="Password">
      </div>
      <div>
      </div>
      <div>
        <input type="submit" name="submit" value="Login" class="form-button">
      </div>
      <div>
        <a href="../index.php">Return to Home</a>
      </div>
    </form>
  </div>

</body>

</html>