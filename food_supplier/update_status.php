<?php
include '../connection.php';
$id=$_GET['id'];
$str="update book_menu set status='delivered' where id='$id'";
mysqli_query($con,$str);
echo"<script>alert('delivered succesfull'); window.location='view_booking.php';</script>";
?>