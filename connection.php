<?php
session_start();
$con=mysqli_connect("localhost","root","","admin");
define('SERVER_PATH',$_SERVER['DOCUMENT_ROOT'].'/localhost/food_paradise/');
define('SITE_PATH','http://localhost/food_paradise/');

define('PRODUCT_IMAGE_SERVER_PATH',SERVER_PATH.'media/');
define('PRODUCT_IMAGE_SITE_PATH',SITE_PATH.'media/');
?>