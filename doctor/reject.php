<?php
include '../connection.php';
$id=$_GET['id'];
$str="update appointment set status='rejected' where id='$id'";
mysqli_query($con,$str);
echo"<script>alert('rejected succesfull'); window.location='index.php';</script>";
?>