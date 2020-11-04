<?php 
include 'includes/head.php';
include 'includes/navbar.php';

include 'admin/connection.php';
?>
<body>
<h1> Contact</h1>

<div class="card">
  <div class="card-body">
    <?php 
      $query = "SELECT * FROM contacts";
      $query_run = mysqli_query($conn, $query);

      if(mysqli_num_rows($query_run) > 0) {
        foreach($query_run as $row) {
          ?>

          <h5 class="card-title"></h5>
          <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($row['image'] ).'" height="150" width="175" class="img-thumbnail" />' ?>;
          <h6> Date: <?php echo $row['name']; ?> </h6>
          <h6> Time: <?php echo $row['email']; ?> </h6>
          <h6> Location: <?php echo $row['position']; ?> </h6>
        <?php

        }
      }
      else {
        echo "no records found";
      }

    ?>
  </div>
</div>

<h2> </h2>

</body>
</html>