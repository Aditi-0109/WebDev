<?php
ob_start();
include "authguard.php";
include "menu.html";
include_once "../shared/connection.php";


$userid = (int)$_SESSION['userid'];
$sql_query = "SELECT * FROM orders
INNER JOIN product ON product.pid=orders.pid 
WHERE userid='$userid'";


$sql_result = mysqli_query($conn, $sql_query);
if ($sql_result) {
    
     while ($dbrow = mysqli_fetch_assoc($sql_result)) 
    {   
        $productName = htmlspecialchars($dbrow['name']);
        $datePlaced = htmlspecialchars($dbrow['date_placed']);

        echo "Product Name ".$productName.", Date Placed: " . $datePlaced ;
        echo "<br>"; 
    }
}
else {
    echo "Error executing query: " . mysqli_error($conn);
}
?>