<?php
require('top.php');
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
    <th>Order id</th>
    <th>Order date</th>
    <th>Address</th>
    <th>Payment Type</th>
    <th>Payment status</th>
    <th>Order status</th>
  </tr>
</thead>
<tbody>
<?php
	$uid=$_SESSION['USER_ID'];
	$res=mysqli_query($con,"select * from `order` where user_id='$uid'");
	while($row=mysqli_fetch_assoc($res)){
	?>  
  <tr>
  <td class="product-add-to-cart"><a href="myorderdetails.php?id=<?php echo $row['id']?>"> <?php echo $row['id']?></a></td>
  <td class="product-name"><?php echo $row['order_date']?></td>
  <td class="product-name">
  <?php echo $row['address']?><br/>
  <?php echo $row['city']?><br/>
  </td>
  <td class="product-name">COD</td>
  <td class="product-name"><?php echo $row['payment_status']?></td>
  <td class="product-name"><?php echo $row['order_status']?></td>  
</tr>
<?php } ?>
</tbody>
</table>

</body>
</html>

