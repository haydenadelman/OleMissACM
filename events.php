<?php
include 'includes/head.php';
include 'includes/navbar.php';

include 'admin/connection.php';
?>

<body>
  <div class="event-title">
    <h1>Club Events</h1>
  </div>
  <div class="event">

    <?php
    $query = "SELECT * FROM events";
    $query_run = mysqli_query($conn, $query);

    if (mysqli_num_rows($query_run) > 0) {
      foreach ($query_run as $row) {
    ?>
        <div class="card-event">
          <h5 class="card-title"> <?php echo $row['title']; ?> </h5>
          <h6> Date: <?php echo $row['date']; ?> </h6>
          <h6> Time: <?php echo $row['time']; ?> </h6>
          <h6> Location: <?php echo $row['location']; ?> </h6>
          <p class="card-task"> <?php echo $row['description']; ?> </p>
        </div>
    <?php
      }
    } else {
      echo "no records found";
    }
    ?>
    </hr>

  </div>

  <h2> </h2>

</body>

</html>