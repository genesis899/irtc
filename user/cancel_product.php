<?php
session_start();
include '../connection.php';


    $user_id = $_SESSION['id'];
    $menu_id = intval($_GET['id']);

    $delete = "DELETE FROM book_product where id = '$menu_id' AND status = 'pending'";
    
    if (mysqli_query($con, $delete)) {
        echo "<script>alert('Item cancelled successfully.'); window.location.href='view_product_booking.php';</script>";
    } else {
        echo "<script>alert('Failed to cancel item.'); window.location.href='view_product_booking.php';</script>";
    }
?>
