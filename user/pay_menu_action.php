<?php
session_start();
include '../connection.php';

$user_id = $_SESSION['id'];
$book_id = intval($_GET['id']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Mark booking as paid (only if still pending)
    $update = "UPDATE book_menu SET status = 'paid' WHERE id = '$book_id' AND user_id = '$user_id' AND status = 'pending'";

    if (mysqli_query($con, $update)) {
        // Fetch the booked menu and quantity
        $bookQuery = "SELECT menu_id, quantity FROM book_menu WHERE id = '$book_id'";
        $bookResult = mysqli_query($con, $bookQuery);
        if ($book = mysqli_fetch_assoc($bookResult)) {
            $menu_id = $book['menu_id'];
            $qtyBooked = $book['quantity'];

            // Reduce the quantity in the menu table
            $reduceQty = "UPDATE menu SET quantity = GREATEST(quantity - $qtyBooked, 0) WHERE id = '$menu_id'";
            mysqli_query($con, $reduceQty);
        }

        echo "<script>alert('Payment successful.'); window.location.href='view_menu_booking.php';</script>";
    } else {
        echo "<script>alert('Payment failed.'); window.location.href='view_menu_booking.php';</script>";
    }
} else {
    echo "<script>alert('Invalid request'); window.location.href='view_menu_booking.php';</script>";
}
?>
