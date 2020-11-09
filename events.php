<?php 
include 'includes/head.php';
include 'includes/navbar.php';

include 'admin/connection.php';
?>
<body>
<h1> Events</h1>

<div class="event">
  <div class="card-event">
    <?php 
      $query = "SELECT * FROM events";
      $query_run = mysqli_query($conn, $query);

      if(mysqli_num_rows($query_run) > 0) {
        foreach($query_run as $row) {
          ?>

          <h5 class="card-title"> <?php echo $row['title']; ?> </h5>
          <h6> Date: <?php echo $row['date']; ?> </h6>
          <h6> Time: <?php echo $row['time']; ?> </h6>
          <h6> Location: <?php echo $row['location']; ?> </h6>
          <p class="card-task"> <?php echo $row['description']; ?> </p>
          <a href="#" class="btn btn-primary"> Go somewhere </a>
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