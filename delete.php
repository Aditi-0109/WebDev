<?php
session_start(); 
include "authguard.php";
include "../shared/connection.php";
if(isset($_GET['pid']) && !empty($_GET['pid'])) {
    $product_id = $_GET['pid'];
    $result=mysqli_query($conn,"DELETE FROM product WHERE pid=$product_id");
    if ($result) {  
        echo "Product Removed";
        header("location:view.php");
        exit; 
        } 
        else {
        echo "Error deleting product: " ;
    }
}
?>
