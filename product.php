<?php 
require('top.php');
if(isset($_GET['id'])){
	$product_id=mysqli_real_escape_string($con,$_GET['id']);
	if($product_id>0){
$get_product=get_product($con,'','',$product_id);
}
}
?>
<div class="heading">
    <h1>Our Store</h1>
    <p><a href="index.php">Home>></a>product</p>
</div>

<section class="product" id="product">
    <div class="box-container">
     <?php
     $get_product=get_product($con,'','','');
     foreach($get_product as $row){
     ?> 
     <form action="insertcart.php" method="POST">
        <div class="box">
            <img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$row['image']?>" alt="image">
            <h3><?php echo $row['name']?></h3>
            <div class="stars">
             <i class="fas fa-star"></i>
             <i class="fas fa-star"></i>
             <i class="fas fa-star"></i>
             <i class="fas fa-star"></i>
             <i class="fas fa-star-half-alt"></i>
            </div>
                <div class="price">TK <?php echo $row['price']?></div>
                <input type='hidden' name='name' value= <?php echo $row['name']?>>
                <input type='hidden' name='price' value= <?php echo $row['price']?>> 
                <div class="quantity" id="qty">
                     <span>quantity:</span>
                     <input type="number" name="quantity" min="1" max="10" value="1">
                 </div>
             
                 <?php if(isset($_SESSION['USER_LOGIN'])){

             echo "<input type='submit' name='addcart' class='btn btn-warning text-white w-100' value='Add To Cart'>";
              }else{
               echo 'please login first';
                }
              ?>
              
        </div>
        </form>
     <?php } ?> 
    </div>
</section>
     

