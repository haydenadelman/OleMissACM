<?php

session_start();
if (!isset($_SESSION['username'])) {
  header("Location:../login.php");
}
include 'connection.php';

// Checked if register button is pressed 
if (isset($_POST['register'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $repassword = $_POST['repassword'];
  $role = $_POST['role'];
  $hashed = hash('sha256', $password);

  $isValid = true;

  // Check fields are empty or not
  if ($username == '' || $password == '' || $repassword == '' || $role == '') {
    $isValid = false;
    header("Location:../users.php?error=Please fill out all fields to continue");
  }

  // Check if confirm password matching or not
  if ($isValid && ($password != $repassword)) {
    $isValid = false;
    header("Location:../users.php?error=Passwords do not match");
  }

  if ($isValid) {

    // Check if Email-ID already exists
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
    if ($result->num_rows > 0) {
      $isValid = false;
      header("Location:../users.php?error=That email is already registered in our system");
    }
  }

  // Insert records
  if ($isValid) {
    $insertSQL = "INSERT INTO users(username,password,role) values(?,?,?)";
    $stmt = $conn->prepare($insertSQL);
    $stmt->bind_param("sss", $username, $hashed, $role);
    $stmt->execute();
    $stmt->close();

    header("Location:../users.php?success=Account successfully created!");
  }
}
