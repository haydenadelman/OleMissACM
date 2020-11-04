<?php
session_start();
if (!isset($_SESSION['username'])) {
  header("Location:login.php");
}
include 'connection.php';

// File upload path

if (isset($_POST["addImage"]) && !empty($_FILES["file"]["name"])) {
  $filename = ($_FILES["file"]["name"]);
  $tempname = ($_FILES["file"]["tmp_name"]);
  $folder = "../uploads/" . basename($_FILES["file"]["name"]);

  $description = $_POST['description'];

  // Get all the submitted data from the form 

  // Execute query 
  mysqli_query($conn ,"INSERT INTO images (imgName, description) VALUES ('$filename', '$description')") ;

  // Now let's move the uploaded image into the folder: image 
  if (move_uploaded_file($tempname, $folder)) {
    header("Location:../images.php?sucess=Image successfully uploaded");
  } else {
    header("Location:../images.php?error=Image upload failed");
  }
} else {
  header("Location:../images.php?error=Please choose file");
}

if(isset($_POST['delete_image'])) {
  $id= $_POST['delete_id'];
  $folder = "../uploads/" . $id;
  unlink($folder);
  $query = "DELETE FROM images WHERE imgName='$id' ";
  $query_run = mysqli_query($conn, $query);
  
  
  header("Location:../images.php?success=Image Deleted Successfully!");
  
}
