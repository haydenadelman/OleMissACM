<?php

session_start();
if (!isset($_SESSION['username'])) {
  header("Location:login.php");
}

include 'connection.php';
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
      <div class="header">Gallery Images
        <div class="logout">
          <a href="logout.php">
            Logout
          </a>
        </div>
      </div>

      <?php if (isset($_REQUEST['error'])) { ?>
        <!-- Error Alerts-->
        <div class="text-center">
          <span class="alert alert-danger"><?php echo $_REQUEST['error']; ?></span>
        </div>
      <?php } ?>
      <?php if (isset($_REQUEST['success'])) { ?>
        <!-- Success Alerts-->
        <div class="text-center">
          <span class="alert alert-success"><?php echo $_REQUEST['success']; ?></span>
        </div>
      <?php } ?>
      <!-- Image table-->
      <?php
      $query = "SELECT * FROM images";
      $query_run = mysqli_query($conn, $query);

      ?>
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>ID</th>
            <th>Image</th>
            <th>Image Name</th>
            <th>Description</th>
            <th>DELETE</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if (mysqli_num_rows($query_run) > 0) {
            while ($row = mysqli_fetch_assoc($query_run)) { 
              $imageURL = 'uploads/' . $row["imgName"];
          ?>
              <tr>
                <td><?php echo $row['imageID']; ?></td>
                <td><img src="<?php echo $imageURL; ?>" alt="" height="60" width="75" /></td>
                <td><?php echo $row['imgName']; ?></td>
                <td><?php echo $row['description']; ?></td>
                <td>
                  <form onsubmit="return confirm('Are you sure you want to delete?');" action="forms/imageform.php" method="POST">
                    <input type="hidden" name="delete_id" value="<?php echo $row['imgName']; ?>">
                    <button type="submit" name="delete_image" class="btn btn-danger">DELETE</button>
                  </form>
                </td>
              </tr>
          <?php
            }
          } else {
            echo "No records found";
          }
          ?>
        </tbody>
      </table>

      <!-- Add Image Modal -->
      <div class="addImagemodal">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addImageModal">
          Add Image
        </button>
        <div class="modal fade" id="addImageModal" tabindex="-1" aria-labelledby="addImageModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Image</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <!-- Add Image-->
                <div id="addImage">
                  <form class="user" name="form-addImage" action="forms/imageform.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                      <input type="file" name="file" id="file">
                    </div>
                    <div class="form-group">
                      <input type="text" name="description" id="description" placeholder="description">
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" name="addImage" class="btn btn-primary">Add</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <hr>


    </div>
  </div>
</body>

<?php
include 'includes/scripts.php';

?>

</html>