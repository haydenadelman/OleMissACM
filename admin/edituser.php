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
      <div class="header">Edit User
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

      <!-- php to grab user data -->
      <?php
      
      if (isset($_POST['edit_user'])) {
        $id = $_POST['edit_id'];
        $query = "SELECT * FROM users WHERE id='$id' ";
        $query_run = mysqli_query($conn, $query);

        foreach ($query_run as $row) {
      ?>
          <!-- Edit User -->
          <form class="user" name="form-register" action="forms/userform.php" method="POST">
            <div class="form-group">
              <input type="hidden" name="edit_id" value="<?php echo $row['ID'] ?>">
            </div>
            <div class="form-group">
              <h6> Username </h6>
              <input type="email" name="edit_username" value="<?php echo $row['username'] ?>" id="username" aria-describedby="emailHelp" placeholder="New Email Address...">
            </div>
            <div class="form-group">
              <h6> Current Password </h6>
              <input type="password" name="edit_password" value="<?php echo $row['password'] ?>" id="password" placeholder="Password">
            </div>
            <div class="form-group">
              <input type="password" name="edit_repassword" id="repassword" placeholder="Re-Enter Password">
            </div>
            <div class="form-group">
              <h6> Current Role </h6>
              <input list="role" class="form-control form-control-user" value="<?php echo $row['role'] ?>" name="edit_role" placeholder="Change account role">
              <datalist id='role'>
                <option value="admin"></option>
                <option value="user"></option>
              </datalist>
            </div>
            <div class="modal-footer">
              <a class="btn btn-secondary" href="users.php">Return to Users</a>
              <button type="submit" name="update_user" class="btn btn-primary">Update</button>
            </div>
          </form>
      <?php
        }
      } ?>
    </div>
  </div>
</body>

<?php
include './includes/scripts.php';

?>

</html>