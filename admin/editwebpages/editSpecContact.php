<?php

session_start();
if (!isset($_SESSION['username'])) {
  header("Location:login.php");
} 
include '../connection.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Admin Dashboard</title>
  <meta charset="utf-8">
  <link href="../css/style.css" rel="stylesheet" type="text/css">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
  <script src="../js/adminmain.js"></script>
  <script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>

</head>

<body>
  <div class="wrapper">
    <?php
    include '../includes/navbar.php';
    ?>

    <div class="main_content">
      <div class="header">Edit Specific Contact
        <div class="logout">
          <a href="../logout.php">
            Logout
          </a>
        </div>
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

      <!-- php to grab user data -->
      <?php
      
      if (isset($_POST['edit_event'])) {
        $id = $_POST['edit_eventid'];
        $query = "SELECT * FROM events WHERE eventID='$id' ";
        $query_run = mysqli_query($conn, $query);

        foreach ($query_run as $row) {
      ?>
          <!-- Edit Event -->
          <form class="user" name="form-editEvent" action="../forms/eventform.php" method="POST">
            <div class="form-group">
              <input type="hidden" name="edit_eventid" value="<?php echo $row['eventID'] ?>">
            </div>
            <div class="form-group">
              <h6> Title </h6>
              <input type="text" name="edit_title" value="<?php echo $row['title'] ?>" id="title">
            </div>
            <div class="form-group">
              <h6> Event Date </h6>
              <input type="date" name="edit_date" value="<?php echo $row['date'] ?>" id="date">
            </div>
            <div class="form-group">
              <h6> Event Time </h6>
              <input type="time" name="edit_time" value="<?php echo $row['time'] ?>" id="time">
            </div>
            <div class="form-group">
              <h6> Event Location</h6>
              <input type="text" name="edit_location" value="<?php echo $row['location'] ?>" id="location">
            </div>
            <div class="form-group">
              <h6> Event Description</h6>
              <textarea name="edit_description" id="description" rows="8" cols="50"><?php echo $row['description'] ?></textarea>
            </div>
            
            <div class="modal-footer">
              <a class="btn btn-secondary" href="../webpages/editEvents.php">Return to Events</a>
              <button type="submit" name="update_event" class="btn btn-primary">Update</button>
            </div>
          </form>
      <?php
        }
      } ?>
    </div>
  </div>
</body>

<?php
include '../includes/scripts.php';

?>

</html>