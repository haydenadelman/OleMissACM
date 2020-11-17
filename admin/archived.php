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
      <div class="header">Archived Messages
        <div class="logout">
          <a href="logout.php">
            Logout
          </a>
        </div>
      </div>
      <div class="users">
        <a class="btn btn-primary" href="pending.php">
          PENDING
        </a>
      </div>
      <?php if (isset($_REQUEST['error'])) { ?>
        <!-- Error Alerts-->
        <div class="text-center">
          <span class="alert alert-danger"><?php echo $_REQUEST['error']; ?></span>
        </div>
      <?php } ?>
      <?php if (isset($_REQUEST['success'])) { ?>
        <!-- Success Alerts-->
        <div class="text-center">
          <span class="alert alert-success"><?php echo $_REQUEST['success']; ?></span>
        </div>
      <?php } ?>
      <!-- User account table-->
      <?php
      $query = "SELECT * FROM messages WHERE type='archived' ORDER BY messageID DESC ";
      $query_run = mysqli_query($conn, $query);

      ?>
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Message</th>
            
          </tr>
        </thead>
        <tbody>
          <?php
          if (mysqli_num_rows($query_run) > 0) {
            while ($row = mysqli_fetch_assoc($query_run)) {
          ?>
              <tr>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['message']; ?></td>
                <td>
                  <form action="forms/messageform.php" method="POST">
                    <input type="hidden" name="return_id" value="<?php echo $row['messageID']; ?>">
                    <button type="submit" name="return_msg" class="btn btn-warning">Inbox</button>
                  </form>
                </td>
                <td>
                  <form onsubmit="return confirm('Are you sure you want to delete?');" action="forms/messageform.php" method="POST">
                    <input type="hidden" name="delete_id" value="<?php echo $row['messageID']; ?>">
                    <button type="submit" name="delete_msg" class="btn btn-danger">DELETE</button>
                  </form>
                </td>
              </tr>
          <?php
            }
          } else {
            echo "No records found";
          }
          ?>
        </tbody>
      </table>

    </div>
  </div>
</body>

<?php
include 'includes/scripts.php';

?>

</html>