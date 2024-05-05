<?php
ob_start();
include "authguard.php";
include "menu.html";
include_once "../shared/connection.php";?>
<!DOCTYPE html>
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
                font-family:"Veranda"
            }
            .price{
                font-size:24px;
            }
            .price::after{
                content:'Rs.';
                color:black;
            }
        .pdt-img{
        width:100%;
        height:250px;
        }
        </style>
        </head>
<body>

<?php
$sql_result=mysqli_query($conn,"select*from product where owner={$_SESSION['userid']}");
$dbrow=mysqli_fetch_assoc($sql_result);


while($dbrow=mysqli_fetch_assoc($sql_result))
{
echo"<div class='pdt-card'>
        <div class='name'>$dbrow[name]</div>
        <div class='price' >$dbrow[price]</div>
        <img class='pdt-img' src='$dbrow[impath]'>
        <div class='detail'>$dbrow[detail]</div>
        <div class='action'>
            <a href='delete.php?pid={$dbrow['pid']}'>
                <button class='btn btn-danger'>Delete</button>
            </a>
        </div>
    </div>";
  $_SESSION['pid']=$dbrow['pid']; 
  
} 

?>
</body>
</html>

