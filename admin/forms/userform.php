<?php

session_start();
if (!isset($_SESSION['username'])) {
  header("Location:login.php");
} elseif ($_SESSION['role'] != "admin") {
  header("Location:index.php");
}
include 'connection.php';

if(isset($_POST['update_user'])) {
  $id = $_POST['edit_id'];
  $username= $_POST['edit_username'];
  $password= $_POST['edit_password'];
  $role= $_POST['edit_role'];

  $query= "UPDATE users SET username='$username', password='$password', role='$role' WHERE id='$id' ";
  $query_run = mysqli_query($conn, $query);

}


?>

