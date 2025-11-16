<?php
session_start();

$subject=$_POST['subject'];
$feedback=$_POST['feedback'];

include '../connection.php'; 
$log=$_SESSION['id']; 

$sql="insert into feedback(subject,feedback,user_id) values('$subject','$feedback','$log')";
mysqli_query($con,$sql);
echo"<script>alert('feedback submitted succesfull'); window.location='index.php';</script>";

?>