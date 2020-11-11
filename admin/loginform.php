<?php
session_start();
include 'connection.php';

$username=$_POST['username'];
$op=$_GET['op'];
$password = hash('sha256', $_POST['password']);

if($op=="in"){
    
    $sql=mysqli_query($conn, "select * from users where username='".$username."' and password='".$password."' ");

    if(mysqli_num_rows($sql)==1) {
        $query = mysqli_fetch_array($sql);

        $hashpass= hash('sha256', $_SESSION['password']);
        $hashquerypass= hash('sha256',$query['password']);

        $_SESSION['username']=$query['username'];
        $hashpass=$hashquerypass;
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