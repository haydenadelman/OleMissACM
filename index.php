<?php
include 'includes/head.php';
include 'admin/connection.php';
?>

<body>

  <div class="main-container">
    <?php
    include 'includes/navbar.php';
    ?>

    <div class="banner-image">
      <div class="banner-content">
        <h1>OleMissACM <br />
          <span>Advancing Computing as a Science & Profession</span>
        </h1>

      </div>
    </div>
    <div class="content-area">
      <div class="wrapper">
        <h2 class="title">Our Mission</h2>
        <p>ACM, the world's largest educational and scientific computing society, delivers resources that advance computing as a science and a profession.</p>
        <div class="btn">
          <a href="about.php">Learn More</a>
        </div>
      </div>
    </div>
    <hr>
    <div class="events">
      <div class="wrapper">
        <h2 class="title">Next event!</h2>
        <?php
        $query = "SELECT * FROM events LIMIT 1";
        $query_run = mysqli_query($conn, $query);

        if (mysqli_num_rows($query_run) > 0) {
          foreach ($query_run as $row) {
        ?>

            <h5 class="card-title"> <?php echo $row['title']; ?> </h5>
            <h6> Date: <?php echo $row['date']; ?> </h6>
            <h6> Time: <?php echo $row['time']; ?> </h6>
            <h6> Location: <?php echo $row['location']; ?> </h6>
            <p class="card-task"> <?php echo $row['description']; ?> </p>
        <?php

          }
        } else {
          echo "no records found";
        }

        ?>


      </div>
    </div>

  </div>


</body>


</html>