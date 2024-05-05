<?php  


include "../shared/connection.php";
include 'viewcart.php';
include 'checkout.php';

$rname = $_POST["name"];
$address = $_POST["address"];
$contact = $_POST["contact"];
$uid = $_SESSION['userid'];

$result = mysqli_query($conn, "SELECT * FROM cart WHERE userid = $uid");
if ($result) {
    $cartid = $_SESSION["cartid"];
    while ($dbrow = mysqli_fetch_assoc($result)) {
        $cartid = $dbrow['cartid'];
        $sql_result = mysqli_query($conn, "INSERT INTO checkout (rname, address, contact, cartid, userid) VALUES ('$rname', '$address', '$contact', $cartid, $uid)");
        if ($sql_result) {
            $orderInsert = mysqli_query($conn, "INSERT INTO orders (cartid, userid, pid)
            SELECT cartid, userid, pid
            FROM cart
            WHERE userid = $uid");
            if ($orderInsert) {
                $cartDelete = mysqli_query($conn, "DELETE FROM cart WHERE userid='$uid'");
               
            } else {
                echo "Error inserting items into orders: " . mysqli_error($conn);
            }
        } else {
            echo "Error inserting order details: " . mysqli_error($conn);
        }
    }
} else {
    echo "Error fetching cart items: " . mysqli_error($conn);
}
echo"order placed successfully!";
echo"<br>";
echo" your order will be delivered within 10 days";

?>
