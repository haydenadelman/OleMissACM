<?php
include 'includes/head.php';
include 'includes/navbar.php';

include 'admin/connection.php';
?>

<body>
  <section class="contact">
    <div class="card-contact">
      <h1>Meet the Team</h1>
      <?php
      $query = "SELECT * FROM contacts";
      $query_run = mysqli_query($conn, $query);

      if (mysqli_num_rows($query_run) > 0) {
        foreach ($query_run as $row) {
      ?>

          <h5 class="card-title"></h5>
          <?php echo '<img src="data:image/jpeg;base64,' . base64_encode($row['image']) . '" height="220" width="170"/>' ?>;
          <div class="contact-text">
            <h6><?php echo $row['name']; ?> </h6>
            <h6> Email: <?php echo $row['email']; ?> </h6>
            <h6> Position: <?php echo $row['position']; ?> </h6>
          </div>
      <?php

        }
      } else {
        echo "no records found";
      }

      ?>

    </div>
  </section>

  <h2 class="title"> Contact Us</h2>

  

</body>

<?php

?>

</html>