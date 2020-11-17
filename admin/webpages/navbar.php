<!--Side Navbar-->
<div class="side-nav">
  <ul>
    <li>
      <a href="../admin.php">
        <span><i class="fa fa-home"></i></span>
        <span>Dashboard</span>
      </a>
    </li>
    <li>
      <a href="../members.php">
        <span><i class="fa fa-user"></i></span>
        <span>Members</span>
      </a>
    </li>
    <li class="nav-item dropdown">
      <a href="#" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span><i class="fa fa-clipboard"></i></span>
        <span>Edit Website</span>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="../webpages/editEvents.php">Events</a>
          <a class="dropdown-item" href="../webpages/editContact.php">Contact Us</a>
          <a class="dropdown-item" href="../images.php">Gallery</a>
        </div>
      </a>
    </li>
    <li>
      <a href="../pending.php">
        <span><i class="fa fa-envelope"></i></span>
        <span>Pending</span>
        <span>
        <?php
        $query = "SELECT messageID FROM messages WHERE type='new' ORDER BY messageID";
        $query_run = mysqli_query($conn, $query);
        $row = mysqli_num_rows($query_run);
        echo '<h6>(' . $row . ')</h6>';
        ?>
        <span>
      </a>
    </li>
  </ul>
</div>