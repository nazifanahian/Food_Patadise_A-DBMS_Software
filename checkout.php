<?php
require('connection.php');
require('functions.php');

?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Check Out</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>
<br>
<div class="row">
  <div class="col-75">
    <div class="container">
      <form action="checkoutcon.php" method="POST">
            <h3> Payment Info</h3>
            <label for="fname"><i class="fa fa-user"></i> Full Name</label>
            <input type="text" name="firstname" placeholder="Enter your name" required>
            <label for="email"><i class="fa fa-envelope"></i> Email</label>
            <input type="text" name="email" placeholder="abc@example.com" required>
            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
            <input type="text" name="address" placeholder="Enter your address" required>
            <label for="city"><i class="fa fa-institution"></i> City</label>
            <input type="text" name="city" placeholder="Dhaka" required>
            <input type="submit" name="submit" class="btn" value='Continue to checkout'>
      <table class="table table-success table-bordered table-striped" >
  <thead class="text-center fs-5">
    <tr>
      <th scope="col">Product Name</th>
      <th scope="col">Product Quantity</th>
      <th scope="col">Product Price</th>
      <th scope="col">Total Price</th>
</tr>
  </thead>
  <tbody class="text-center">
  <?php
   $total = 0;
   $alltotal = 0;
   if(isset($_SESSION['cart']))
   {
   foreach($_SESSION['cart'] as $key => $value){
     $total = $value['productPrice'] * $value['productQuantity'] ;
     $alltotal += $value['productPrice'] * $value['productQuantity'] ; 
   echo " 
    <form action='insertcart.php' method='POST'> 
     <tr>
     <td><input type='hidden' name='name' value='$value[productName]'>$value[productName]</td>
     <td><input type='hidden' name='quantity' value='$value[productQuantity]'>$value[productQuantity]</td>
     <td><input type='hidden' name='price' value='$value[productPrice]'>$value[productPrice]</td>
     <td>$total TK</td>
     </tr>
     </form>
     ";
   }
  }
 ?>
</tbody>
</table>
<table class="table table-success table-bordered table-striped" >
<thead class="text-center fs-5">
  <tr>
      <th scope="col"style="text-align:center">Total </th>
    
      <th scope="col" style="text-align:right"><input type="hidden" name="alltotal"><?php echo number_format($alltotal,2)?> TK</th>
</tr>
  </thead>
 </table>
</form>
    </div>
  </div>
</div>
 
</body>
</html>
<style>
body {
  font-family: Arial;
  font-size: 17px;
  padding: 8px;
}

* {
  box-sizing: border-box;
}

.row {
  display: -ms-flexbox; 
  display: flex;
  -ms-flex-wrap: wrap; 
  flex-wrap: wrap;
  margin: 0 -16px;
}

.col-75 {
  -ms-flex: 75%; 
  flex: 75%;
}

.col-75 {
  padding: 0 16px;
}

.container {
  background-color: #f2f2f2;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;
}

input[type=text] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.btn {
  background-color: #04AA6D;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

.btn:hover {
  background-color: #45a049;
}

a {
  color: #2196F3;
}

hr {
  border: 1px solid lightgrey;
}
</style>
