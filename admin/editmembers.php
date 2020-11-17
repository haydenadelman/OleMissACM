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
      
      if (isset($_POST['edit_member'])) {
        $id = $_POST['edit_memberID'];
        $query = "SELECT * FROM members WHERE memberID='$id' ";
        $query_run = mysqli_query($conn, $query);

        foreach ($query_run as $row) {
      ?>
          <!-- Edit Member -->
          <form class="user" name="form-editMember" action="forms/membersform.php" method="POST">
            <div class="form-group">
              <input type="hidden" name="edit_memberID" value="<?php echo $row['memberID'] ?>">
            </div>
            <div class="form-group">
              <h6> Name </h6>
              <input type="text" name="edit_name" value="<?php echo $row['name'] ?>" id="name">
            </div>
            <div class="form-group">
              <h6> Email </h6>
              <input type="text" name="edit_email"value="<?php echo $row['email'] ?>" id="email">
            </div>
            <div class="form-group">
              <h6> Dues </h6>
              <input type="text" name="edit_dues" value="<?php echo $row['dues'] ?>" id="dues">
            </div>
            <div class="form-group">
              <h6> Classification </h6>
              <input type="text" name="edit_classification" value="<?php echo $row['classification'] ?>" id="classification">
            </div>
            <div class="form-group">
              <h6> Date Added </h6>
              <input type="date" name="edit_date_added" value="<?php echo $row['date_added'] ?>" id="date_added">
            </div>
            
            
            <div class="modal-footer">
              <a class="btn btn-secondary" href="members.php">Return to Members</a>
              <button type="submit" name="update_member" class="btn btn-primary">Update</button>
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