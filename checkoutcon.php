<?php
require('connection.php');
require('functions.php');

$sr=0;
$total=0;
$alltotal = 0;
if(isset($_POST['submit'])){
	$address=get_safe_value($con,$_POST['address']);
	$city=get_safe_value($con,$_POST['city']);
	$user_id=$_SESSION['USER_ID'];
	foreach($_SESSION['cart'] as $key => $value){

		$alltotal += $value['productPrice'] * $value['productQuantity'] ;
	  }
	$total_price= $alltotal;

	mysqli_query($con,"insert into `order`(user_id,address,city,
	total_price,payment_status,order_status)
	value('$user_id','$address','$city',
	'$total_price','pending','1')");
	$order_id=mysqli_insert_id($con);	
	foreach($_SESSION['cart'] as $key => $value){
		$name=$value['productName'];
	    $quantity=$value['productQuantity'];
		$total = $value['productPrice'] * $value['productQuantity'] ;
		mysqli_query($con,"insert into order_details(order_id,name,quantity,price)
	    value('$order_id','$name','$quantity','$total')");
	}
     header('Location:thankyou.php');
}
?>