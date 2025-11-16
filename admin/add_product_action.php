<?php
session_start();
$product_name=$_POST['product_name'];
$description=$_POST['description'];
$quantity=$_POST['quantity'];
$price=$_POST['price'];



$image=$_FILES['image']['name'];
$image_tmp=$_FILES['image']['tmp_name'];
$image_target="../uploads/" . basename($image);
move_uploaded_file($image_tmp,$image_target);

include '../connection.php';  
$log=$_SESSION['id'];

$sql="insert into product(product_name,description,quantity,price,image,login_id) values('$product_name','$description','$quantity','$price','$image','$log')";
mysqli_query($con,$sql);
echo"<script>alert('product added succesfull'); window.location='index.php';</script>";

?>