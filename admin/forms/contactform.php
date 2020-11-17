<?php

session_start();
if (!isset($_SESSION['username'])) {
  header("Location:../login.php");
}
include 'connection.php';

if (isset($_POST['addContact'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $position = $_POST['position'];
  $image = file_get_contents($_FILES["image"]["tmp_name"]);

  $insertSQL = "INSERT INTO contacts (name,email,position, image) VALUES (?,?,?,?)";
  $stmt = $conn->prepare($insertSQL);
  $stmt->bind_param("ssss", $name, $email, $position, $image);
  $stmt->execute();
  $stmt->close();

  header("Location:../webpages/editContact.php?success=Contact added");

}

if (isset($_POST['update_contact'])) {
  $id = $_POST['edit_contactID'];
  $name = $_POST['edit_name'];
  $email = $_POST['edit_email'];
  $position = $_POST['edit_position'];

  $isValid = true;

  // Update Contact info
  if ($isValid) {
    $query = "UPDATE contacts SET name='$name', email='$email', position='$position' WHERE contactID='$id' ";
    $query_run = mysqli_query($conn, $query);

    header("Location:../webpages/editContact.php?success=Contact successfully updated!");
  }
}

if (isset($_POST['delete_contact'])) {
  $id = $_POST['delete_id'];
  $query = "DELETE FROM contacts WHERE contactID='$id' ";
  $query_run = mysqli_query($conn, $query);

  header("Location:../webpages/editContact.php?success=Contact successfully deleted!");
}
