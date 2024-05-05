<?php
  
 include "../shared/connection.php";
 include "authguard.php";
$pid=$_GET['pid'];

$userid=$_SESSION['userid'];

$status=mysqli_query($conn,"insert into cart(userid,pid)values($userid,$pid)");
if($status){
    echo"Product added to Cart";
    header("location:viewcart.php");
}
else{
    echo mysqli_error($conn);

}

?>