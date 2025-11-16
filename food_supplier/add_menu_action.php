<?php
session_start();
include '../connection.php';

$food_name = trim($_POST['food_name']);
$description = $_POST['description'];
$quantity = $_POST['quantity'];
$price = $_POST['price'];
$log = $_SESSION['id'];

$food_name_lower = strtolower($food_name);

$image = $_FILES['image']['name'];
$image_tmp = $_FILES['image']['tmp_name'];
$image_target = "../uploads/" . basename($image);

$check_sql = "SELECT * FROM menu WHERE LOWER(food_name) = '$food_name_lower' AND supplier_id = '$log'";
$check_result = mysqli_query($con, $check_sql);

if (mysqli_num_rows($check_result) > 0) {
    echo "<script>alert('Menu item already exists!'); window.location='index.php';</script>";
    exit();
} else {
    if (move_uploaded_file($image_tmp, $image_target)) {
        $sql = "INSERT INTO menu (food_name, description, quantity, price, image, status, supplier_id) 
                VALUES ('$food_name', '$description', '$quantity', '$price', '$image', 'pending', '$log')";
        if (mysqli_query($con, $sql)) {
            echo "<script>alert('Menu added successfully'); window.location='index.php';</script>";
        } else {
            echo "<script>alert('Database error.'); window.location='index.php';</script>";
        }
    } else {
        echo "<script>alert('Failed to upload image.'); window.location='index.php';</script>";
    }
}
?>
