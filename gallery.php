<?php
include 'includes/head.php';
include 'includes/navbar.php';

include 'admin/connection.php';
?>

<body>

  <div class="wrapper">
    <h2 class="title">ACM Gallery</h2>
    <p>Photos taken from past events and meetings!</p>

  </div>

  <!-- Gallery -->
  <div class="gallery" id="gallery">
    <?php
    $query = "SELECT * FROM images";
    $query_run = mysqli_query($conn, $query);
    if (mysqli_num_rows($query_run) > 0) {
      while ($row = mysqli_fetch_assoc($query_run)) {
        $imageURL = 'admin/uploads/' . $row["imgName"];

    ?>
        <!-- Loop to get gallery images from database-->
        <div class="gallery_item">
          <img src="<?php echo $imageURL; ?>" class="format" height="275" width="325" alt="Gallery_image">
          <h3><?php echo $row['description']; ?></h3>
        </div>
    <?php
      }
    } else {
      echo "No records found";
    }
    ?>
  </div>


  <!------ Include the above in your HEAD tag ---------->

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
  <div class="container">
    <div class="row">
      <div class="row">
        <div class="col-lg-3 col-md-4 col-xs-6 thumb">
          <?php
          $query = "SELECT * FROM images";
          $query_run = mysqli_query($conn, $query);
          if (mysqli_num_rows($query_run) > 0) {
            while ($row = mysqli_fetch_assoc($query_run)) {
              $imageURL = 'admin/uploads/' . $row["imgName"];
          ?>
              <!-- Loop to get gallery images from database-->
              <a href="#" data-image-id="" data-toggle="modal" data-title="" data-image="<?php echo $imageURL; ?>" data-target="#image-gallery">
                <img src="<?php echo $imageURL; ?>" class="img-thumbnail" alt="Another alt text">
                <h3><?php echo $row['description']; ?></h3>
              </a>
          <?php
            }
          } else {
            echo "No records found";
          }
          ?>
        </div>


      <div class="modal fade" id="image-gallery" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="image-gallery-title"></h4>
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span>
              </button>
            </div>
            <div class="modal-body">
              <img id="image-gallery-image" class="img-responsive col-md-12" src="">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary float-left" id="show-previous-image"><i class="fa fa-arrow-left"></i>
              </button>

              <button type="button" id="show-next-image" class="btn btn-secondary float-right"><i class="fa fa-arrow-right"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</body>

</html>