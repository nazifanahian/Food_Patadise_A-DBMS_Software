<?php
require('connection.php');
require('functions.php');

$email=get_safe_value($con,$_POST['Email']);
$password=get_safe_value($con,$_POST['Password']);

$res=mysqli_query($con,"select * from users where Email='$email' and Password='$password'");
$check_user=mysqli_num_rows($res);
if($check_user>0){
	$row=mysqli_fetch_assoc($res);
	$_SESSION['USER_LOGIN']='yes';
	$_SESSION['USER_ID']=$row['ID'];
	$_SESSION['USER_NAME']=$row['Name'];
	header('Location:index.php');
}else{
	echo "wrong";
}
?>
