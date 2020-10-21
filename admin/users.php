<?php

session_start();
if (!isset($_SESSION['username'])) {
  header("Location:login.php");
} elseif ($_SESSION['role'] != "admin") {
  header("Location:index.php");
}
include 'connection.php';

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
      <div class="header">Users
        <div class="logout">
          <a href="logout.php">
            Logout
          </a>
        </div>
      </div>
      <!-- User account table-->
      <?php
      $sql = "SELECT ID, username, role FROM users";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        echo "<table><tr><th>ID</th><th>Name</th><th>Role</th></tr>";
        //Output data of each row
        while ($row = $result->fetch_assoc()) {
          echo "<tr><td>" . $row["ID"] . "</td><td>" . $row["username"] . "</td><td>" . $row["role"] . "</td></tr>";
        }
        echo "</table>";
      } else {
        echo "0 results";
      }
      $conn->close();
      ?>
      <hr>
      <div class="users">
        <a href="./register.php">
          Add new user
        </a>
      </div>
      <hr>
    </div>
  </div>
</body>

<?php
include './includes/scripts.php';

?>

</html>