<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation Page</title>
</head>
<body>
<?php
require('top.php');

?>
    <div class="center">
        <img src="party.jpg" alt="" width="50" height="190" class="mid">
     <h1><i>Order Confirmed</i>
     <br>
     <pr style="color:rgb(0,139,139)">You will receive the product soon.Thanks for being with us.</pr>
     </h1>
    <a href="cartunset.php" type="submit" name="submit" class="btn">Ok</a>
    </div>
</body>
</html>

<style>
.center{
    position: absolute;
    top: 60%;
    left: 50%;
    transform: translate(-50%, -50%);
    width:500px;
    height:200px;
    background: white;
    border-radius: 10px;
}

.center h1
{
    text-align: center;
    padding: 0 0 20px 0;
    color:#27ae60;
    margin: 10px;
    font-size: 30px;
    background:white;
}

.mid {
  top:10%;
  display: block;
  margin-left: auto;
  margin-right: auto;
  width:50%;
  
}
</style>