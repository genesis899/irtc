<?php
session_start();
include '../connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_SESSION['id'];

    $card_number = $_POST['card_number'];
    $card_name = $_POST['card_name'];
    $expiry_date = $_POST['expiry_date'];
    $cvv = $_POST['cvv'];

    // Get all pending bookings for this user
    $bookQuery = "SELECT menu_id, quantity FROM book_menu WHERE user_id = '$user_id' AND status = 'pending'";
    $bookResult = mysqli_query($con, $bookQuery);

    while ($book = mysqli_fetch_assoc($bookResult)) {
        $menu_id = $book['menu_id'];
        $qtyBooked = $book['quantity'];

        // Decrease menu stock
        $reduceQty = "UPDATE menu SET quantity = GREATEST(quantity - $qtyBooked, 0) WHERE id = '$menu_id'";
        mysqli_query($con, $reduceQty);
    }

    // Mark all as paid
    $update = "UPDATE book_menu SET status = 'paid' WHERE user_id = '$user_id' AND status = 'pending'";
    
    if (mysqli_query($con, $update)) {
        echo "<script>alert('All payments successful.'); window.location.href='view_menu_booking.php';</script>";
    } else {
        echo "<script>alert('Payment failed. Please try again.'); window.location.href='view_menu_booking.php';</script>";
    }
} else {
    echo "<script>alert('Invalid request'); window.location.href='view_menu_booking.php';</script>";
}
?>
