<?php

session_start();
if (!isset($_SESSION['username'])) {
  header("Location:../login.php");
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
    include 'navbar.php';
    ?>

    <div class="main_content">
      <div class="header">Edit Events page
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
      <!-- User account table-->
      <?php
      $query = "SELECT * FROM events";
      $query_run = mysqli_query($conn, $query);

      ?>
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Date</th>
            <th>Time</th>
            <th>Location</th>
            <th>Description</th>
            <th>Event Image</th>
            <th>EDIT</th>
            <th>DELETE</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if (mysqli_num_rows($query_run) > 0) {
            while ($row = mysqli_fetch_assoc($query_run)) {
          ?>
              <tr>
                <td><?php echo $row['eventID']; ?></td>
                <td><?php echo $row['title']; ?></td>
                <td><?php echo $row['date']; ?></td>
                <td><?php echo $row['time']; ?></td>
                <td><?php echo $row['location']; ?></td>
                <td><?php echo $row['description']; ?></td>
                <td><?php echo $row['eventImage']; ?></td>
                <td>
                  <!-- EDIT event button to go to page-->
                  <form action="../editwebpages/editSpecEvent.php" method="POST">
                    <input type="hidden" name="edit_eventid" value="<?php echo $row['eventID']; ?>">
                    <button type="submit" name="edit_event" class="btn btn-info">EDIT</button>
                  </form>
                </td>
                <td>
                  <form action="../forms/eventform.php" method="POST">
                    <input type="hidden" name="delete_id" value="<?php echo $row['eventID']; ?>">
                    <button type="submit" name="delete_event" class="btn btn-danger">DELETE</button>
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

      <!-- Add Event Modal -->
      <div class="addEventmodal">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addEventModal">
          Add Event
        </button>
        <div class="modal fade" id="addEventModal" tabindex="-1" aria-labelledby="addEventModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add new event!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <!-- Add Event-->
                <div id="addEvent">
                  <form class="user" name="form-addEvent" action="../forms/eventform.php" method="POST">
                    <div class="form-group">
                      <input type="text" name="title" id="title" placeholder="Event title...">
                    </div>
                    <div class="form-group">
                      <input type="date" name="date" id="date" placeholder="Enter event date">
                    </div>
                    <div class="form-group">
                      <input type="time" name="time" id="time" placeholder="Enter event start time">
                    </div>
                    <div class="form-group">
                      <input type="text" name="location" id="location" placeholder="Enter event location">
                    </div>
                    <div class="form-group">
                      <textarea name ="description" id="description" rows="6" cols="40" placeholder="Describe event"></textarea>
                    </div>
                    <hr>
                    <!-- Image input (not implemented)
                    <div class="form-group">
                      <h6>Add event image?</h6>
                      <input type="file" name="eventImage" id="eventImage">
                    </div>
                    -->
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" name="addEvent" class="btn btn-primary">Add Event</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <hr>
      <!-- Footer -->
      
    </div>
  </div>
</body>

<?php
include '../includes/scripts.php';

?>

</html>