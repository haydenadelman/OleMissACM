<?php

session_start();
if (!isset($_SESSION['username'])) {
  header("Location:login.php");
} elseif ($_SESSION['role'] != "user") {
  header("Location:admin.php");
}
include 'connection.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Officer Dashboard</title>
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
      <div class="header">Welcome to Officer Dashboard!!
        <div class="logout">
          <a href="logout.php">
            Logout
          </a>
        </div>
      </div>
      <!-- Members Card-->
      <div class="card" style="width: 18rem;">
        <div class="card-body">
          <h5 class="card-title">Club Member Count</h5>
          <p class="card-text">
            <?php
            $query = "SELECT memberID FROM members ORDER BY memberID";
            $query_run = mysqli_query($conn, $query);

            $row = mysqli_num_rows($query_run);

            echo '<h4>' . $row . '</h4>';
            ?>
          </p>
          <a href="members.php" class="btn btn-info">Go to members</a>
        </div>
      </div>
      <!-- Funds Card-->
      <div class="card" style="width: 18rem;">
        <div class="card-body">
          <h5 class="card-title">Total Dues Received:</h5>
          <p class="card-text">
            <?php
            $query = "SELECT SUM(dues) FROM members";
            $sum = mysqli_query($conn, $query);
            $row = mysqli_fetch_array($sum);

            echo '<h4>$' . $row['SUM(dues)'] . '</h4>';
            ?>
          </p>

        </div>
      </div>
    </div>
  </div>
</body>

<?php
include 'includes/scripts.php';

?>

</html>