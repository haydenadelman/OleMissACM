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
  $image = $_FILES["image"]['imageName'];

  if (file_exists("../upload/" . $_FILES["image"]["imageName"])) {
    $store = $_FILES["image"]["imageName"];
    header('Location: ../webpages/editContact.php?error=Image Already Exists');
  } 
  else {
    $query = "INSERT INTO contacts ('name','email','position','image') VALUES ('$name','$email','$position','$image')";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
      move_uploaded_file($_FILES["image"]["tmp_name"], "../upload/" . $_FILES['image']['imageName']);
      header('Location: ../webpages/editContact.php?success=Contact Added');
    } else {
      header('Location: ../webpages/editContact.php?error=Contact Not Added');
    }
  }
}

if (isset($_POST['update_event'])) {
  $id = $_POST['edit_eventid'];
  $title = $_POST['edit_title'];
  $date = $_POST['edit_date'];
  $time = $_POST['edit_time'];
  $location = $_POST['edit_location'];
  $description = $_POST['edit_description'];

  $isValid = true;

  // Update records
  if ($isValid) {
    $query = "UPDATE events SET title='$title', date='$date', time='$time', location='$location', description='$description' WHERE eventid='$id' ";
    $query_run = mysqli_query($conn, $query);

    header("Location:../webpages/editEvents.php?success=Account successfully updated!");
  }
}

if (isset($_POST['delete_contact'])) {
  $id = $_POST['delete_id'];
  $query = "DELETE FROM contacts WHERE contactID='$id' ";
  $query_run = mysqli_query($conn, $query);

  header("Location:../webpages/editContact.php?success=Account successfully deleted!");
}
