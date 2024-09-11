<?php
require('connection.php');
require('functions.php');

    if(isset($_SESSION['ADMIN_LOGIN']) && $_SESSION['ADMIN_LOGIN'] !=''){
       
    }
    else{
       header('location:login.php');
       die();
    }

?>

<!doctype html>
<html class="no-js" lang="">
   <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Dashboard Page</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="assets/css/normalize.css">
      <link rel="stylesheet" href="assets/css/bootstrap.min.css">
      <link rel="stylesheet" href="assets/css/font-awesome.min.css">
      <link rel="stylesheet" href="assets/css/themify-icons.css">
      <link rel="stylesheet" href="assets/css/pe-icon-7-filled.css">
      <link rel="stylesheet" href="assets/css/flag-icon.min.css">
      <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
      <link rel="stylesheet" href="assets/css/style.css">
      <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
   </head>
   <body>
   <header>
           <div class="header-1">
               <a href="#" class="logo"><i class="fa fa-shopping-basket"></i>Food Paradise</a>
           </div>

           <div class="header-2">
               <div id="menu-bar" class="fa fa-bars"></div>
               <nav class="navbar">
                   <a href="categories.php">Categories</a>
                   <a href="product.php">Products</a>
                   <a href="order.php">Orders</a>
                   <a href="users.php">Users</a> 
               </nav>

               <div class="icons">
               <div class="user-area dropdown float-right">
                  <?php if(isset($_SESSION['ADMIN_LOGIN'])){
                     echo '<a href="logout.php" class="fa fa-user-circle ">Logout</a>';
                  }
                   ?>
           </div>
       </header>
   
                  
                   

