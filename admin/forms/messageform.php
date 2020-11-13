<?php

session_start();
if (!isset($_SESSION['username'])) {
  header("Location:../login.php");
}
include 'connection.php';


/* Website Contact Message form */
if (isset($_POST['contact_us'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $message= $_POST['message'];

  $isValid = true;


  if ($isValid) {
    $insertSQL = "INSERT INTO messages(name,email,message) values(?,?,?)";
    $stmt = $conn->prepare($insertSQL);
    $stmt->bind_param("sss", $name, $email, $message);
    $stmt->execute();
    $stmt->close();

    header("Location:../../contact.php?success=Message Sent! Thanks for your submission.");
  }
}


/* Archive Message form */
if (isset($_POST['archive_msg'])) {
  $id = $_POST['archive_id'];
  $isValid = true;

  // Move message
  if ($isValid) {
    $query = "UPDATE messages SET type='archived' WHERE messageID='$id' ";
    $query_run = mysqli_query($conn, $query);

    header("Location:../pending.php?success=Message Archived!");
  }
}

/* Return Message to inbox form */
if (isset($_POST['return_msg'])) {
  $id = $_POST['return_id'];
  $isValid = true;

  // Move message back
  if ($isValid) {
    $query = "UPDATE messages SET type='new' WHERE messageID='$id' ";
    $query_run = mysqli_query($conn, $query);

    header("Location:../archived.php?success=Message returned to Inbox!");
  }
}

/* Delete Message from archive */
if (isset($_POST['delete_msg'])) {
  $id = $_POST['delete_id'];
  $query = "DELETE FROM messages WHERE messageID='$id' ";
  $query_run = mysqli_query($conn, $query);

  header("Location:../archived.php?success=Message successfully deleted!");
}
