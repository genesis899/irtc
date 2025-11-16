<?php
session_start();
$station_name=$_POST['station_name'];
$stop_order=$_POST['stop_order'];
$train_id=$_POST['train_id'];

include '../connection.php';  

$sql="insert into train_stops(station_name,stop_order,train_id) values('$station_name','$stop_order','$train_id')";
mysqli_query($con,$sql);
echo"<script>alert('Station added succesfull'); window.location='index.php';</script>";

?>