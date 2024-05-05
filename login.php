<?php

session_start();
$_SESSION['login status']=false;
$uname=$_POST["username"];
$upass=$_POST["password"];
$cipher_pass=md5($upass);
include_once "connection.php";
$sql_result=mysqli_query($conn,"select * from user where username='$uname' and password='$cipher_pass'");
$total_rows=mysqli_num_rows($sql_result);
$dbrow=mysqli_fetch_assoc($sql_result);
if($total_rows>0){
    $_SESSION['login_status']=true;
    $_SESSION["usertype"]=$dbrow["usertype"];
    $_SESSION['userid']=$dbrow['userid'];
    $_SESSION['usename']=$dbrow['username'];
    echo"login success";
    print_r($dbrow);
    if($dbrow['usertype']=='Vendor'){
        header("location:../vendor/home.php");
    }
    else if($dbrow['usertype']=='Customer'){
        header("location:../customer/home.php");
    }
}
else{
    echo"invalid credentials";
}
?>
