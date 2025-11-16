<?php
session_start();
include '../connection.php';


    $user_id = $_SESSION['id'];
    $id = intval($_GET['id']);

    $delete = "DELETE FROM bookings where id = '$id'";
    
    if (mysqli_query($con, $delete)) {
        echo "<script>alert('Train Booking Cancelled refund will be credited to your account with in 5-7 working days..'); window.location.href='view_train_booking.php';</script>";
    } else {
        echo "<script>alert(' Train Booking Cancelled.'); window.location.href='view_train_booking.php';</script>";
    }
?>
