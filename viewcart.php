<html>
    <head>
    <style>
        .pdt-card{
            border-color:black;
            background-color:lightgrey;
            width:250px;
            height:300px;
    
            margin:20px;
            padding:20px;
            display:inline-block;
            overflow-y:scroll;
        }
        .name{
            font-size:24px;
            font-family:"Veranda";
        }
        .price{
            
        }
        .price::after{
            content:'Rs.';
            color:black;
        }
       .pdt-img{
    width:100%;
    height:250px;
       }
       .orderconfirm{
        border:black;
        margin-bottom:10px
       }
    </style>
    </head>
<html>
<?php
include "authguard.php";
include "../shared/connection.php";
include "menu.html";
$total=0;
$sql_result=mysqli_query($conn,"select * from cart join product on cart.pid=product.pid where userid='$_SESSION[userid]'");
while($dbrow=mysqli_fetch_assoc($sql_result))
{
    echo"<div class='pdt-card'>
        <div class='name'>$dbrow[name]</div>
        <div class='price' >$dbrow[price]</div>
        <img class='pdt-img' src='$dbrow[impath]'>
        <div class='detail'>$dbrow[detail]</div>
        <div class='action text-center mt-2'>
            <a href='deletecart.php?cartid=$dbrow[cartid]'>
            <button class='btn btn-danger'>remove from cart</button>
            </a>
        </div>
    </div>";
    
    $total=$total+$dbrow['price'];
    $_SESSION["cartid"]=$dbrow["cartid"];
    
}
echo" 
<div class='orderconfirm'>
<p>Total:$total Rs.</p>
<a href='checkout.php'>
<button class='btn btn-primary'>Checkout</button>
</a>
</div>";



