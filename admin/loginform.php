<?php
session_start();
include 'connection.php';

$username=$_POST['username'];
$password=$_POST['password'];
$op=$_GET['op'];

if($op=="in"){
    
    $sql=mysqli_query($conn, "select * from users where username='".$_POST['username']."' and password='".$_POST['password']."' ");

    if(mysqli_num_rows($sql)==1) {
        $query = mysqli_fetch_array($sql);
        $_SESSION['username']=$query['username'];
        $_SESSION['password']=$query['password'];
        $_SESSION['role']=$query['role'];

        if($query['role']=="admin"){
            header("Location:admin.php");
        }
        elseif($query['role']=="user"){
            header("Location:index.php");
        }

    }
    else {
        header("Location:login.php?error=Invalid login details");
    }
}
 
elseif($op=="out") {
    unset($_SESSION['username']);
    unset($_SESSION['role']);
    header("Location:login.php?error=Please Enter Email and Password");

}


?>