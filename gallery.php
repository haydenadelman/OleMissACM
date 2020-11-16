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

  <?php /*
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
  */
  ?>

  <div class="container">
    <div class="row">
      <div class="row">

        <?php
        $query = "SELECT * FROM images";
        $query_run = mysqli_query($conn, $query);
        if (mysqli_num_rows($query_run) > 0) {
          while ($row = mysqli_fetch_assoc($query_run)) {
            $imageURL = 'admin/uploads/' . $row["imgName"];
        ?>
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
              <!-- Loop to get gallery images from database-->
              <div class="gallery-item">
                <img src="<?php echo $imageURL; ?>" class="img-fluid" alt="Another alt text">
              </div>

              <h3><?php echo $row['description']; ?></h3>

            </div>
        <?php
          }
        } else {
          echo "No records found";
        }
        ?>
      </div>
    </div>

</body>

</html>