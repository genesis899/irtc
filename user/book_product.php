<?php
session_start();
include '../connection.php';

if (!isset($_SESSION['id'])) {
    echo "<h4 class='text-center text-danger mt-5'>You must be logged in to add items to the cart.</h4>";
    exit;
}

if (!isset($_POST['product_id'], $_POST['quantity']) || 
    !is_numeric($_POST['product_id']) || 
    !is_numeric($_POST['quantity']) || 
    $_POST['quantity'] < 1) {
    echo "<h4 class='text-center text-danger mt-5'>Invalid input.</h4>";
    exit;
}

$user_id = intval($_SESSION['id']);
$product_id = intval($_POST['product_id']);
$quantity = intval($_POST['quantity']);

// Check product exists and is approved (remove 'status' if not applicable)
$menu_query = "SELECT price FROM product WHERE id = $product_id";
$menu_result = mysqli_query($con, $menu_query);

if (!$menu_result) {
    die("Error fetching product: " . mysqli_error($con));
}

if (mysqli_num_rows($menu_result) !== 1) {
    echo "<h4 class='text-center text-danger mt-5'>Menu item not found.</h4>";
    exit;
}

$menu_data = mysqli_fetch_assoc($menu_result);
$price = $menu_data['price'];
$total = $price * $quantity;

$insert_query = "INSERT INTO book_product (quantity, total, status, user_id, product_id) 
                 VALUES ($quantity, $total, 'pending', $user_id, $product_id)";

if (mysqli_query($con, $insert_query)) {
    echo "<script>alert('Item added to cart successfully!'); window.location.href='view_product.php';</script>";
} else {
    die("Insert failed: " . mysqli_error($con));
}
?>
