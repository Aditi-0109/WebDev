<?php
$uname=$_POST["username"];
$upass1=$_POST["password1"];
$upass2=$_POST["password2"];
$utype=$_POST["usertype"];


if(empty($uname))
{echo"Empty field";
die;
}
if($upass1!=$upass2)
{echo"Password Mismatch";
die;}
include_once "connection.php";
$cipher_pass=md5($upass1);
$status=mysqli_query($conn,"insert into user(username,password,usertype)values('$uname','$cipher_pass','$utype')");
if($status){
    echo"registration successfull";
    header("location:login.html");
}
else{
    echo mysqli_error($conn);
}
?>