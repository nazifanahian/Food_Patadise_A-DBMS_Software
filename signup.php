<?php
   $name= $_POST['name'];
   $email= $_POST['email'];
   $password= $_POST['password'];
   $phonenumber= $_POST['phoneNumber'];
   $address= $_POST['address'];
   $dateofbirth= $_POST['dateofBirth'];
   $gender= $_POST['gender'];
   $conn= new mysqli('localhost','root','','admin');
   if($conn->connect_error){
      die('connection failed : ' .$conn->connect_error);
   }
   else{
      $stmt= $conn->prepare("Insert into users(Name,Email,Password,
      Phone_Number,Gender, Date_of_Birth,Address)
      value(?,?,?,?,?,?,?)");
      $stmt->bind_param("sssssss",$name,$email,$password,
      $phonenumber,$gender, $dateofbirth,$address);
      $stmt->execute();
      header('Location:index.php');
      $stmt->close();
      $conn->close();
   }
?>