<?php

$host="localhost";
$user="hhadelma";
$password="hAdel09212020";
$db="hhadelma";

mysql_connect($host,$user,$password);
mysql_select_db($db);

if(isset($_POST['username'])){
    $uname=$_POST['username'];
    $password=$_POST['password'];

    $sql="select * from loginform where user='".$uname."'AND Pass='".$password."' limit 1";

    $result=mysql_query($sql);

    if(mysql_num_rows($result)==1){
        echo " You have successfully logged in";
        exit();
    }
    else{
        echo " You have entered incorrect password"
        exit();
    }
}

?>






<!DOCTYPE html>
<html>
<body>
    <div class="container">
        <form method="POST" action="#">
            <div class="form_input">
                <input type="text" name="username" placeholder=" Enter your Username"/>
            </div>
            <div class="form_input">
                <input type="password" name="password" placeholder=" Enter your password"/>
            </div>            
            <input type="submit" name="submit" value="LOGIN" class="login"/>   
        </form> 
    </div>
</body>


</html>
