<?php
session_start();
$name=$_POST['name'];
$phone_no=$_POST['phone'];
$coach_no=$_POST['coach_no'];
$seat_no=$_POST['seat_no'];
$doctor_id=$_POST['doctor_id'];



include '../connection.php';  
$log=$_SESSION['id'];

$sql="insert into appointment(name,phone,coach_no,seat_no,status,user_id,doctor_id) values('$name','$phone_no','$coach_no','$seat_no','pending','$log','$doctor_id')";
mysqli_query($con,$sql);
echo"<script>alert('Booking succesfull'); window.location='index.php';</script>";

?>