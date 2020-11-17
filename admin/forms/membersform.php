<?php

session_start();
if (!isset($_SESSION['username'])) {
  header("Location:../login.php");
}
include 'connection.php';

if (isset($_POST['add_member'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $dues = $_POST['dues'];
  $classification = $_POST['classification'];
  $date_added = $_POST['date'];

  $isValid = true;


  if ($isValid) {
    $insertSQL = "INSERT INTO members(name,email,dues,classification,date_added) values(?,?,?,?,?)";
    $stmt = $conn->prepare($insertSQL);
    $stmt->bind_param("sssss", $name, $email, $dues, $classification, $date_added);
    $stmt->execute();
    $stmt->close();

    header("Location:../members.php?success=Member Successfully added!");
  }
}

if (isset($_POST['update_member'])) {
  $id = $_POST['edit_memberID'];
  $name= $_POST['edit_name'];
  $email = $_POST['edit_email'];
  $dues = $_POST['edit_dues'];
  $classification = $_POST['edit_classification'];
  $date_added = $_POST['edit_date_added'];

  $isValid = true;

  // Update event
  if ($isValid) {
    $query = "UPDATE members SET name='$name', email='$email', dues='$dues', classification='$classification', date_added='$date_added' WHERE memberID='$id' ";
    $query_run = mysqli_query($conn, $query);

    header("Location:../members.php?success=Member successfully updated!");
  }
}

if (isset($_POST['delete_member'])) {
  $id = $_POST['delete_id'];
  $query = "DELETE FROM members WHERE memberID='$id' ";
  $query_run = mysqli_query($conn, $query);

  header("Location:../members.php?success=Member successfully deleted!");
}
