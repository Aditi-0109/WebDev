
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
<div class="d-flex justify-content-center align-items-center vh-100">
    <form action="orderconfirm.php" method="post" class="w=50 bg-warning p-4" >
        <h3 class="text-center text-grey">checkout here..</h3>
        <input required type="text" placeholder="Name" name="name" class="form-control mt-3">
        <input required type="text" placeholder="Address" name="address" class="form-control mt-3">
        <input required type="varchar" placeholder="Contact no." name="contact" class="form-control mt-3">
       
    <div class="text-center mt-3">
        <button class='btn btn-success'>Place Order</button>
    </div>
    
    
   </form> 
</div>
</body>
</html>

