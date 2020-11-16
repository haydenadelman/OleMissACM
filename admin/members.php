<?php

session_start();
if (!isset($_SESSION['username'])) {
  header("Location:login.php");
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
      <div class="header">Members
        <div class="logout">
          <a href="logout.php">
          Logout
          </a>
        </div>
      </div>
    <?php
      $sql = "SELECT name, email, dues, classification, date_added FROM members";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        echo "<table><tr><th>name</th><th>email</th><th>dues</th><th>classification</th><th>date_added</th></tr>";
        //Output data of each row
        while ($row = $result->fetch_assoc()) {
          echo "<tr><td>" . $row["name"] . "</td><td>" . $row["email"] . "</td><td>" . $row["dues"] . "</td><td>" . $row["classification"] . "</td><td>". $row["date_added"] . "</td></tr>";
        }
        echo "</table>";
      } else {
        echo "0 results";
      }
      $conn->close();
      ?>
      <hr>
    </div>
  </div>
</body>

<?php
include 'includes/scripts.php';

?>

</html>