<?php
require('connection.php');
//session_destroy();
       $product_name=$_POST['name'];
       $product_price=$_POST['price'];
       $product_quantity=$_POST['quantity'];

if(isset($_POST['addcart'])){
    
 $_SESSION['cart'][] = array('productName' => $product_name, 
                            'productPrice' => $product_price, 
                            'productQuantity' => $product_quantity);
                            header("location:viewcart.php");
 }


       
     //remove product
     if(isset($_POST['remove'])){
        foreach($_SESSION['cart'] as $key => $value)
        {
            if($value['productName'] === $_POST['item'])
            {
                unset($_SESSION['cart'][$key]);
                $_SESSION['cart'] = array_values($_SESSION['cart']);
                header('location:viewcart.php');
            }
        }
     }

     //update product
     if(isset($_POST['update']))
     {
        foreach($_SESSION['cart'] as $key => $value)
        {
            if($value['productName'] === $_POST['item']){
                $_SESSION['cart'][$key] = array('productName' => $product_name, 
                                                 'productPrice' => $product_price, 
                                                 'productQuantity' => $product_quantity);
                                                  header("location:viewcart.php");
            }
        }
     }
     
    
    
?>