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
      $query = "SELECT * FROM members";
      $query_run = mysqli_query($conn, $query);

      ?>
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Dues</th>
            <th>Classification</th>
            <th>Date Added</th>
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
                <td><?php echo $row['memberID']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td>$<?php echo $row['dues']; ?></td>
                <td><?php echo $row['classification']; ?></td>
                <td><?php echo $row['date_added']; ?></td>
                <td>
                  <!-- EDIT event button to go to page-->
                  <form action="editmembers.php" method="POST">
                    <input type="hidden" name="edit_memberID" value="<?php echo $row['memberID']; ?>">
                    <button type="submit" name="edit_member" class="btn btn-info">EDIT</button>
                  </form>
                </td>
                <td>
                  <form onsubmit="return confirm('Are you sure you want to delete?');" action="forms/membersform.php" method="POST">
                    <input type="hidden" name="delete_id" value="<?php echo $row['memberID']; ?>">
                    <button type="submit" name="delete_member" class="btn btn-danger">DELETE</button>
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

      <!-- Add member Modal -->
      <div class="membermodal">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#memberModal">
          Add Member
        </button>
        <div class="modal fade" id="memberModal" tabindex="-1" aria-labelledby="memberModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Member!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <!-- Add member-->
                <div id="add_member">
                  <form class="user" name="form-add_member" action="forms/membersform.php" method="POST">
                    <div class="form-group">
                      <input type="text" name="name" id="name" placeholder="New Member Name">
                    </div>
                    <div class="form-group">
                      <input type="email" name="email" id="email" placeholder="Member Email Address...">
                    </div>
                    <div class="form-group">
                      <input type="text" name="dues" id="dues" placeholder="Enter Dues Paid ">
                    </div>
                    <div class="form-group">
                      <input type="text" name="classification" id="classification" placeholder="Enter Class Year">
                    </div>
                    <div class="form-group">
                      <label>Date Added</label>
                      <input type="date" name="date" id="date" placeholder="Date Added (YYYY-MM-DD)">
                    </div>
                    
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" name="add_member" class="btn btn-primary">Register</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <hr>
    </div>
  </div>
</body>

<?php
include 'includes/scripts.php';

?>

</html>