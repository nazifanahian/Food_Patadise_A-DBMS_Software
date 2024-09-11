<?php
require('top.php');
$order_id=get_safe_value($con,$_GET['id']);
?>
 <div class="heading">
        <p><a href="index.php">Home>></a>My Orders</p>
    </div>

<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>
</head>
<body>

<h1>History</h1>

<table id="customers">
    <thead>
  <tr>
    <th>Product Name</th>
    <!--<th>Product Image</th>-->
    <th>Quantity</th>
    <th>Price</th>
  </tr>
</thead>
<tbody>
<?php
	$uid=$_SESSION['USER_ID'];
    $sql="select distinct(order_details.id) ,order_details.*,product.name,product.image from order_details,product ,`order` where order_details.order_id='$order_id' and `order`.user_id='$uid' and order_details.name=product.name";
	$res=mysqli_query($con,$sql);
	$total_price=0;

    while($row=mysqli_fetch_assoc($res)){
       $total_price+=$row['price'];
       

    ?>  
  <tr>
  <td class="product-name"><?php echo $row['name']?></td>
<!--<td class="product-name"> <img src="<?php //echo PRODUCT_IMAGE_SITE_PATH.$row['image']?>"></td>-->
<td class="product-name"><?php echo $row['quantity']?></td>
<td class="product-name"><?php echo $row['price']?></td>    
</tr>
<?php } ?> 
<tr>
<td colspan="1"></td>
<td class="product-name">Total Price</td>
<td class="product-name"><?php echo $total_price?></td>
 </tr>
</tbody>
</table>

</body>
</html>