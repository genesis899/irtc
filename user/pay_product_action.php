<?php
session_start();
include '../connection.php';

if (!isset($_GET['id'])) {
    echo "<script>alert('Invalid request.'); window.location.href='view_product_booking.php';</script>";
    exit;
}

$user_id = $_SESSION['id'];
$book_id = intval($_GET['id']);

// 1️⃣ Get booking info
$booking_sql = "SELECT * FROM book_product WHERE id='$book_id' AND user_id='$user_id' AND status='pending'";
$booking_result = mysqli_query($con, $booking_sql);

if (mysqli_num_rows($booking_result) == 1) {
    $booking = mysqli_fetch_assoc($booking_result);
    $product_id = $booking['product_id'];
    $qty_booked = intval($booking['quantity']);

    // 2️⃣ Get product stock
    $product_sql = "SELECT quantity FROM product WHERE id='$product_id'";
    $product_result = mysqli_query($con, $product_sql);
    $product = mysqli_fetch_assoc($product_result);
    $available = intval($product['quantity']);

    if ($available < $qty_booked) {
        echo "<script>alert('Payment failed: Not enough stock available.'); window.location.href='view_product_booking.php';</script>";
        exit;
    }

    // 3️⃣ Mark booking as paid
    $update_booking = "UPDATE book_product SET status='paid' WHERE id='$book_id'";
    mysqli_query($con, $update_booking);

    // 4️⃣ Decrease product quantity
    $new_qty = $available - $qty_booked;
    mysqli_query($con, "UPDATE product SET quantity='$new_qty' WHERE id='$product_id'");

    echo "<script>alert('Payment successful. Product stock updated.'); window.location.href='view_product_booking.php';</script>";
} else {
    echo "<script>alert('Invalid or already paid booking.'); window.location.href='view_product_booking.php';</script>";
}
?>
