<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>
<?php
    require('top.php');
    ?>
<div class="container">
<div class="row">
    <div class="col-lg-12 text-center border rounded bg-light my-5">
        <h1>My Cart</h1><br>
</div>

<div class="col-lg-9">
<table class="table table-success table-bordered table-striped" >
  <thead class="text-center fs-5">
    <tr>
      <th scope="col">Serial No</th>
      <th scope="col">Product Name</th>
      <th scope="col">Product Price</th>
      <th scope="col">Quantity</th>
      <th scope="col">Total Price</th>
      <th scope="col">Update</th>
      <th scope="col">Remove</th>
    </tr>
  </thead>
  <tbody class="text-center">
      <?php
      $total = 0;
      $alltotal = 0;
      if(isset($_SESSION['cart']))
      {
      foreach($_SESSION['cart'] as $key => $value){
        $sr = $key+1;
        $total = $value['productPrice'] * $value['productQuantity'] ;
        $alltotal += $value['productPrice'] * $value['productQuantity'] ; 
      echo " 
       <form action='insertcart.php' method='POST'> 
        <tr>
        <td>$sr</td>
        <td><input type='hidden' name='name' value='$value[productName]'>$value[productName]</td>
        <td><input type='hidden' name='price' value='$value[productPrice]'>$value[productPrice]</td>
        <td><input type='number' name='quantity' min='1' max='10' value='$value[productQuantity]'></td>
        <td>$total TK</td>
        <td><button name='update' class= 'btn-info btn-lg'>Update</button></td>
        <td><button name='remove' class= 'btn-primary btn-lg'>Remove</button></td>
        <td><input type = 'hidden' name = 'item' value ='$value[productName]'></td>
        </tr>
        </form>
        ";
      }
     }
     ?>
     </tbody>
    </table>

    </div>

    <div class="col-lg-3 text-center">
        <h3 style="color:green;">TOTAL</h3>
        <h1 class="bg-success"><b><?php echo number_format($alltotal,2)?> TK</b></h1>
        <a class="btn-lg btn success" href="index.php">Continue Shopping</a><br>
        <a class="btn-lg btn success" href="checkout.php">Checkout</a>
    </div>
    </div>
    </div>


   </body>
</html>
