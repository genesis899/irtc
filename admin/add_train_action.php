<?php
session_start();
$train_name=$_POST['train_name'];
$train_no=$_POST['train_no'];
$from=$_POST['from'];
$to=$_POST['to'];


$image=$_FILES['image']['name'];
$image_tmp=$_FILES['image']['tmp_name'];
$image_target="../uploads/" . basename($image);
move_uploaded_file($image_tmp,$image_target);

include '../connection.php';  
$log=$_SESSION['id'];

$sql="insert into train(name,train_no,from_d,to_d,image,login_id) values('$train_name','$train_no','$from','$to','$image','$log')";
mysqli_query($con,$sql);
echo"<script>alert('train added succesfull'); window.location='index.php';</script>";

?>