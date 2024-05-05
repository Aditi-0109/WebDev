<?php
session_start();
if($_SESSION['login_status']==false)
{echo"unautorised access 401";
die;}
if($_SESSION['usertype']!="Vendor"){
    echo "Forbiden Access 403";
    die;
}
?>