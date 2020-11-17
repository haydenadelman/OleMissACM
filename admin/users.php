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
  <script src="js/main.js"></script>
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
      $query = "SELECT * FROM users";
      $query_run = mysqli_query($conn, $query);

      ?>
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Role</th>
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
                <td><?php echo $row['ID']; ?></td>
                <td><?php echo $row['username']; ?></td>
                <td><?php echo $row['role']; ?></td>
                <td>
                  <!-- EDIT user button to go to page-->
                  <form action="edituser.php" method="POST">
                    <input type="hidden" name="edit_id" value="<?php echo $row['ID']; ?>">
                    <button type="submit" name="edit_user" class="btn btn-info">EDIT</button>
                  </form>
                </td>
                <td>
                  <form onsubmit="return confirm('Are you sure you want to delete?');" action="forms/userform.php" method="POST">
                    <input type="hidden" name="delete_id" value="<?php echo $row['ID']; ?>">
                    <button type="submit" name="delete_user" class="btn btn-danger">DELETE</button>
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

      <!-- Register Modal -->
      <div class="registermodal">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#registerModal">
          Register User
        </button>
        <div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add new user!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <!-- Register-->
                <div id="register">
                  <form class="user" name="form-register" action="forms/registerform.php" method="POST">
                    <div class="form-group">
                      <input type="email" name="username" id="username" aria-describedby="emailHelp" placeholder="New Email Address...">
                    </div>
                    <div class="form-group">
                      <input type="password" name="password" id="password" placeholder="Password">
                    </div>
                    <div class="form-group">
                      <input type="password" name="repassword" id="repassword" placeholder="Re-Enter Password">
                    </div>
                    <div class="form-group">
                      <input list="role" class="form-control form-control-user" name="role" placeholder="Choose account role">
                      <datalist id='role'>
                        <option value="admin"></option>
                        <option value="user"></option>
                      </datalist>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" name="register" class="btn btn-primary">Register</button>
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
include './includes/scripts.php';

?>

</html>