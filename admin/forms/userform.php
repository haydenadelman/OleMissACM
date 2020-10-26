<?php

session_start();
if (!isset($_SESSION['username'])) {
  header("Location:../login.php");
}
include 'connection.php';

if (isset($_POST['edit_user'])) {
  $id = $_POST['edit_id'];
  $query = "SELECT * FROM users WHERE id='$id' ";
  $query_run = mysqli_query($conn, $query);

  foreach ($query_run as $row) {
?>
    <form class="user" name="form-editUser" action="userform.php" method="POST">
      <div class="form-group">
        <input type="email" name="username" value="<?php echo $row['username'] ?>" id="username" aria-describedby="emailHelp" placeholder="Change email eddress...">
      </div>
      <div class="form-group">
        <input type="password" name="password" id="password" placeholder="Change password">
      </div>
      <div class="form-group">
        <input type="password" name="repassword" id="repassword" placeholder="Re-Enter new password">
      </div>

  <?php
  }
}

  ?>