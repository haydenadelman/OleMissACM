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
  <title>Admin Dashboard</title>
  <meta charset="utf-8">
  <link href="css/style.css" rel="stylesheet" type="text/css">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
  <script src="js/adminmain.js"></script>
  <script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>

</head>

<body>
  <div class="wrapper">
    <?php
    include 'includes/navbar.php';
    ?>

    <div class="main_content">
      <div class="header">Welcome to Admin Dashboard!
        <div class="logout">
          <a href="logout.php">
          Logout
          </a>
        </div>
      </div>
      <div class="users">
        <a href="users.php">
          View/Edit users
        </a>
      </div>
      <hr>
    </div>
  </div>
</body>

<?php
include 'includes/scripts.php';

?>

</html>