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
  
  $isValid = true;

  $query= "UPDATE users SET username='$username', password='$password', role='$role' WHERE id='$id' ";
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
   /*
   if($isValid){

     // Check if Email-ID already exists
     $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
     $stmt->bind_param("s", $username);
     $stmt->execute();
     $result = $stmt->get_result();
     $stmt->close();
     if($result->num_rows > 0){
       $isValid = false;
       header("Location:../edituser.php?error=That email is already registered in our system");
     }

   }
   */

   // Update records
   if($isValid){
    $query= "UPDATE users SET username='$username', password='$password', role='$role' WHERE id='$id' ";
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


