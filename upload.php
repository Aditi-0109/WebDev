<?php
include "authguard.php";

print_r($_POST);
echo "<br>";
print_r($_FILES['pdtimg']['tmp_name']);
$source_path=$_FILES['pdtimg']['tmp_name'];
$target_path="../shared/images/".$_FILES['pdtimg']['name'];
move_uploaded_file($source_path,$target_path);
include_once "../shared/connection.php";
$status=mysqli_query($conn,"INSERT into product (name, price, detail, impath, owner) values('$_POST[name]', $_POST[price], '$_POST[detail]',' $target_path', $_SESSION[userid])");
        
if($status){
    echo "Product uploaded successfully";
}
else{echo mysqli_error($conn);

}
?>