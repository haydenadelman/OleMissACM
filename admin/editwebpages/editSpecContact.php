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
      
      if (isset($_POST['edit_contact'])) {
        $id = $_POST['edit_contactID'];
        $query = "SELECT * FROM contacts WHERE contactID='$id' ";
        $query_run = mysqli_query($conn, $query);

        foreach ($query_run as $row) {
      ?>
          <!-- Edit Contact -->
          <form class="user" name="form-editContact" action="../forms/contactform.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
              <input type="hidden" name="edit_contactID" value="<?php echo $row['contactID'] ?>">
            </div>
            <div class="form-group">
              <h6> Contact Name</h6>
              <input type="text" name="edit_name" value="<?php echo $row['name'] ?>" id="name">
            </div>
            <div class="form-group">
              <h6> Email </h6>
              <input type="email" name="edit_email" value="<?php echo $row['email'] ?>" id="email">
            </div>
            <div class="form-group">
              <h6> Position </h6>
              <input type="position" name="edit_position" value="<?php echo $row['position'] ?>" id="position">
            </div>
            <div>
              <h6> Contact photo </h6>
              <h6><?php echo '<img src="data:image/jpeg;base64,'.base64_encode($row['image'] ).'" height="60" width="75" class="img-thumbnail" />' ?></h6>
            </div>
            
            <div class="modal-footer">
              <a class="btn btn-secondary" href="../webpages/editContact.php">Return to Contacts</a>
              <button type="submit" name="update_contact" class="btn btn-primary">Update</button>
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