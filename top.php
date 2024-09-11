<?php
require('connection.php');
require('functions.php');
$cat_res=mysqli_query($con,"select * from category where status=1 order by categories asc");
$cat_arr=array();
while($row=mysqli_fetch_assoc($cat_res)){
	$cat_arr[]=$row;	
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Home page</title>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
       <link rel="stylesheet" href="style.css">
    </head>
    <body>
       <header>
           <div class="header-1">
               <a href="#" class="logo"><i class="fas fa-shopping-basket"></i>Food Paradise</a>

               <from action="" class="search-box-container">
                   <input type="search" id="search-box" placeholder="search here...">
                   <label for="search-box" class="fas fa-search"></label>
              </from>
           </div>



<div class="header-2">
 <div id="menu-bar" class="fas fa-bars"></div>
<nav class="navbar">
<ul class="main__menu">
<li class="dropdown"><a href="index.php">Home</a></li>
 <li class="dropdown"><a href="#">Categories</a>
 <ul class="dropdown-content">
 <?php 
foreach($cat_arr as $list){ ?>
 <a href="categories.php ? ID=<?php echo $list['ID']?>"><?php echo $list['categories'] ?> </a>
 <?php } ?>
</ul></li>
<li class="dropdown"><a href="contact.php">Contact</a></li> 
</nav>

<?php
$count = 0;
if(isset($_SESSION['cart'])){
   $count = count($_SESSION['cart']);
}
?>
<div class="icons">
<a class="cart__menu" href="viewcart.php"><i class="fas fa-shopping-cart"></i><sup>(<?php echo $count ?>)</sup></a>

    <?php if(isset($_SESSION['USER_LOGIN'])){
        echo '<a href="myorder.php" class="fas fa-user-circle ">My Order</a><a href="logout.php" class="fas fa-user-circle ">Logout</a>
        ';
        }else{
        echo '<a href="login.html" class="fas fa-user-circle ">Login</a>';
        }
    ?>
      
</div>
</header>
 







<script>
let menu = document.querySelector('#menu-bar');
let navbar = document.querySelector('.navbar');
let header = document.querySelector('.header-2');

menu.addEventListener('click', () =>{
    menu.classList.toggle('fa-times');
    navbar.classList.toggle('active');
});

window.onscroll = () =>{
    menu.classList.remove('fa-times');
    navbar.classList.remove('active');

    if(window.scrollY > 150){
        header.classList.add('active');
    }else{
        header.classList.remove('active');
    }


}
</script>