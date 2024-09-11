<?php
require('connection.php');
require('functions.php');
unset($_SESSION['cart']);
header('location:index.php');
die();
?>