<?php
session_start();
include '../connection.php';
$availability=$_POST['availability'];
$log=$_SESSION['id'];

$str="update doctor_signup set availability='$availability' where login_id='$log'";
mysqli_query($con,$str);
echo"<script>alert('availability updated'); window.location='index.php';</script>";
?>