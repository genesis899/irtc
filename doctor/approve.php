<?php
include '../connection.php';
$id=$_GET['id'];
$str="update appointment set status='approved' where id='$id'";
mysqli_query($con,$str);
echo"<script>alert('approvel succesfull'); window.location='index.php';</script>";
?>