<?php
ob_start();
include "authguard.php";
include "menu.html";
include_once "../shared/connection.php";

$userid = $_SESSION['userid'];

$sql_query = "SELECT * FROM checkout 
              INNER JOIN orders ON  checkout.cartid=orders.cartid
              INNER JOIN product on product.pid=orders.pid
              WHERE product.owner = $userid";

$sql_result = mysqli_query($conn, $sql_query);



if ($sql_result) {


    while ($dbrow = mysqli_fetch_assoc($sql_result)) {
        echo "Product ID: " . $dbrow['pid'] . "<br>";
        echo "Product Name: " . $dbrow['name'] . "<br>";
        echo "Receiver's details: " . $dbrow['rname'] . " -> " . $dbrow['address'] . " -> " . $dbrow['contact'] . "<br>";
        echo "Placed on: " . $dbrow['date_placed'] . "<br>";
        echo "<br>"; 
    }
} else {
    
    echo "Error executing query: " . mysqli_error($conn);
}

?>
