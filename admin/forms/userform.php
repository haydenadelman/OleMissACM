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
  $repassword= $_POST['edit_repassword'];
  $role= $_POST['edit_role'];
  $hashed= hash('sha256', $_POST['edit_password']);
  
  $isValid = true;

  $query= "UPDATE users SET username='$username', password='$hashed', role='$role' WHERE id='$id' ";
  $query_run= mysqli_query($conn, $query);

   // Check fields are empty or not
   if($username == '' && $password== '' && $repassword == '' && $role == ''){
     $isValid = false;
     header("Location:../users.php?error=Please input some information to update");
   }

   // Check if confirm password matching or not
   if($isValid && ($password != $repassword) ){
     $isValid = false;
     header("Location:../users.php?error=Passwords do not match");
   }

   // Update records
   if($isValid){
    $query= "UPDATE users SET username='$username', password='$hashed', role='$role' WHERE id='$id' ";
    $query_run = mysqli_query($conn, $query);

     header("Location:../users.php?success=Account successfully updated!");
   }
}

if(isset($_POST['delete_user'])) {
  $id= $_POST['delete_id'];
  $query = "DELETE FROM users WHERE ID='$id' ";
  $query_run = mysqli_query($conn, $query);

  header("Location:../users.php?success=Account successfully deleted!");
}

?>
