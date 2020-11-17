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
      <div class="header">Edit Contact Us page
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
      $query = "SELECT * FROM contacts";
      $query_run = mysqli_query($conn, $query);

      ?>
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Club Position</th>
            <th>Image</th>
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
                <td><?php echo $row['contactID']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['position']; ?></td>
                <td><?php echo '<img src="data:image/jpeg;base64,'.base64_encode($row['image'] ).'" height="60" width="75" class="img-thumbnail" />' ?></td>
                <td>
                  <!-- EDIT event button to go to page-->
                  <form action="../editwebpages/editSpecContact.php" method="POST">
                    <input type="hidden" name="edit_contactID" value="<?php echo $row['contactID']; ?>">
                    <button type="submit" name="edit_contact" class="btn btn-info">EDIT</button>
                  </form>
                </td>
                <td>
                  <form onsubmit="return confirm('Are you sure you want to delete?');" action="../forms/contactform.php" method="POST">
                    <input type="hidden" name="delete_id" value="<?php echo $row['contactID']; ?>">
                    <button type="submit" name="delete_contact" class="btn btn-danger">DELETE</button>
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

      <!-- Add Contact Modal -->
      <div class="addEventmodal">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addContactModal">
          Add Contact
        </button>
        <div class="modal fade" id="addContactModal" tabindex="-1" aria-labelledby="addContactModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add new contact!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <!-- Add Contact-->
                <div id="addContact">
                  <form class="user" name="form-addContact" action="../forms/contactform.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                      <input type="text" name="name" id="name" placeholder="Enter full name..." required>
                    </div>
                    <div class="form-group">
                      <input type="email" name="email" id="email" placeholder="Enter email" required>
                    </div>
                    <div class="form-group">
                      <input type="text" name="position" id="position" placeholder="Enter position" required>
                    </div>
                    <div class="form-group">
                      <h6>Contact Image: (Max File Size: 2 Mb)</h6>
                      <input type="file" name="image" id="image">
                    </div>
                    <hr>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" name="addContact" class="btn btn-primary">Add Contact</button>
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