<?php
session_start();
include '../connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_SESSION['id'];

    // 1️⃣ Fetch all pending bookings
    $sql = "SELECT * FROM book_product WHERE user_id='$user_id' AND status='pending'";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($booking = mysqli_fetch_assoc($result)) {
            $product_id = $booking['product_id'];
            $qty_booked = intval($booking['quantity']);

            // 2️⃣ Get product stock
            $product_sql = "SELECT quantity FROM product WHERE id='$product_id'";
            $product_result = mysqli_query($con, $product_sql);
            $product = mysqli_fetch_assoc($product_result);
            $available = intval($product['quantity']);

            // 3️⃣ Only process if enough stock remains
            if ($available >= $qty_booked) {
                $new_qty = $available - $qty_booked;
                mysqli_query($con, "UPDATE product SET quantity='$new_qty' WHERE id='$product_id'");
                mysqli_query($con, "UPDATE book_product SET status='paid' WHERE id='{$booking['id']}'");
            }
        }

        echo "<script>alert('All product payments successful and stock updated.'); window.location.href='view_product_booking.php';</script>";
    } else {
        echo "<script>alert('No pending products to pay.'); window.location.href='view_product_booking.php';</script>";
    }
} else {
    echo "<script>alert('Invalid request.'); window.location.href='view_product_booking.php';</script>";
}
?>
