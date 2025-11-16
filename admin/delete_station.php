<?php
include '../connection.php';

$id = $_GET['id'];
$train_id = $_GET['train_id'];

mysqli_query($con, "DELETE FROM train_stops WHERE id = $id");

header("Location: add_station.php?id=$train_id");
?>
    