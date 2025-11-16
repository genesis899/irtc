<?php
include '../connection.php';
$id=$_GET['id'];
$str="update book_product set status='delivered' where id='$id'";
mysqli_query($con,$str);
echo"<script>alert('delivered succesfull'); window.location='view_product_order.php';</script>";
?>