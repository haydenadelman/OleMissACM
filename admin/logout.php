<?php 

session_start();
unset($_SESSION['username']);
unset($_SESSION['role']);
session_destroy();
header('location:login.php');

?>