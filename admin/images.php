<?php

session_start();
if (!isset($_SESSION['username'])) {
  header("Location:login.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Admin Dashboard</title>
  <meta charset="utf-8">
  <link href="css/style.css" rel="stylesheet" type="text/css">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
  <script src="js/main.js"></script>
  <script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>

</head>

<body>
  <div class="wrapper">
    <?php
    include 'includes/navbar.php';
    ?>

    <div class="main_content">
      <div class="header">Images
        <div class="logout">
          <a href="logout.php">
            Logout
          </a>
        </div>
      </div>

      <div class="container" style="width:900px;">
        <h3 align="center">View/Edit Images</h3>
        <br />
        <div align="right">
          <button type="button" name="add" id="add" class="btn btn-success">Add</button>
        </div>
        <br />
        <div id="image_data">

        </div>
      </div>
    </div>
  </div>  
</body>

<div id="imageModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Image</h4>
      </div>
      <div class="modal-body">
        <form id="image_form" method="POST" enctype="multipart/form-data">
          <p><label>Select Image</label>
            <input type="file" name="image" id="image" /></p><br />
          <input type="hidden" name="action" id="action" value="insert" />
          <input type="hidden" name="image_id" id="image_id" />
          <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-info" />

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<?php
include 'includes/scripts.php';

?>

</html>