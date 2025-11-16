<?php
session_start();
include '../connection.php';

if (!isset($_SESSION['id'])) {
    echo "<h4 class='text-center text-danger mt-5'>You must be logged in to add items to the cart.</h4>";
    exit;
}

if (!isset($_POST['menu_id'], $_POST['quantity']) || 
    !is_numeric($_POST['menu_id']) || 
    !is_numeric($_POST['quantity']) || 
    $_POST['quantity'] < 1) {
    echo "<h4 class='text-center text-danger mt-5'>Invalid input.</h4>";
    exit;
}

$user_id = $_SESSION['id'];
$menu_id = intval($_POST['menu_id']);
$quantity = intval($_POST['quantity']);

$menu_query = "SELECT price FROM menu WHERE id = '$menu_id' AND status = 'approved'";
$menu_result = mysqli_query($con, $menu_query);

if (mysqli_num_rows($menu_result) !== 1) {
    echo "<h4 class='text-center text-danger mt-5'>Menu item not found or not approved.</h4>";
    exit;
}

$menu_data = mysqli_fetch_assoc($menu_result);
$price = $menu_data['price'];
$total = $price * $quantity;
$insert_query = "INSERT INTO book_menu (quantity, total, status, user_id, menu_id) 
                 VALUES ('$quantity', '$total', 'pending', '$user_id', '$menu_id')";

if (mysqli_query($con, $insert_query)) {
    echo "<script>alert('Item added to cart successfully!'); window.location.href='view_menu.php';</script>";
} else {
    echo "<h4 class='text-center text-danger mt-5'>Failed to add item to cart.</h4>";
}
?>
