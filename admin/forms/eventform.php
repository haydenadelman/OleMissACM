<?php

session_start();
if (!isset($_SESSION['username'])) {
  header("Location:../login.php");
}
include 'connection.php';

if (isset($_POST['addEvent'])) {
  $title = $_POST['title'];
  $date = $_POST['date'];
  $time = $_POST['time'];
  $location = $_POST['location'];
  $description = $_POST['description'];

  $isValid = true;


  if ($isValid) {
    $insertSQL = "INSERT INTO events(title,date,time,location,description) values(?,?,?,?,?)";
    $stmt = $conn->prepare($insertSQL);
    $stmt->bind_param("sssss", $title, $date, $time, $location, $description);
    $stmt->execute();
    $stmt->close();

    header("Location:../webpages/editEvents.php?success=Event Successfully added!");
  }
}

if (isset($_POST['update_event'])) {
  $id = $_POST['edit_eventID'];
  $title = $_POST['edit_title'];
  $date = $_POST['edit_date'];
  $time = $_POST['edit_time'];
  $location = $_POST['edit_location'];
  $description = $_POST['edit_description'];

  $isValid = true;

  // Update event
  if ($isValid) {
    $query = "UPDATE events SET title='$title', date='$date', time='$time', location='$location', description='$description' WHERE eventid='$id' ";
    $query_run = mysqli_query($conn, $query);

    header("Location:../webpages/editEvents.php?success=Account successfully updated!");
  }
}

if (isset($_POST['delete_event'])) {
  $id = $_POST['delete_id'];
  $query = "DELETE FROM events WHERE eventID='$id' ";
  $query_run = mysqli_query($conn, $query);

  header("Location:../webpages/editEvents.php?success=Account successfully deleted!");
}
