<?php
include 'includes/head.php';
include 'includes/navbar.php';

include 'admin/connection.php';
?>

<body>
  <?php if (isset($_REQUEST['success'])) { ?>
    <!-- Success Alerts-->
    <div class="text-center">
      <span class="alert alert-success"><?php echo $_REQUEST['success']; ?></span>
    </div>
  <?php } ?>
  <section class="contact">
    <h1>Meet the Team</h1>
    <div class="contact-container">
      <div class="card-contact">
        <?php
        $query = "SELECT * FROM contacts";
        $query_run = mysqli_query($conn, $query);

        if (mysqli_num_rows($query_run) > 0) {
          foreach ($query_run as $row) {
        ?>

            <h5 class="card-title"></h5>
            <?php echo '<img src="data:image/jpeg;base64,' . base64_encode($row['image']) . '" height="220" width="170"/>' ?>
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

    </div>
  </section>

  <div class="contact-us">
    <h2 class="title"> Contact Us</h2>
    <h4 class="title">Want to set up a meeting or talk with our team? </br>
      Send us a message!</h4>

    <div class="contact-form">
      <form class="contact-us-form" name="form-contactUs" action="admin/forms/messageform.php" method="POST">
        <div class="form-group">
          <label for="name">Your Name:</label>
          <input type="text" name="name" id="name">
        </div>
        <div class="form-group">
          <label for="email">Your Email:</label>
          <input type="email" name="email" id="email">
        </div>
        <div class="form-group">
          <label for="message">Message:</label>
          <div class="form-group">
            <textarea name="message" id="message" rows="6" cols="40" placeholder="Enter message"></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" name="contact_us" class="btn-contact">Message</button>
        </div>
      </form>
    </div>
  </div>



</body>

<?php

?>

</html>