<?php
include '../connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $train_id = intval($_POST['train_id']);
    $from_station = mysqli_real_escape_string($con, $_POST['from_station']);
    $to_station   = mysqli_real_escape_string($con, $_POST['to_station']);
    $fare         = intval($_POST['fare']);

    $sql = "INSERT INTO fares (train_id, from_station, to_station, fare)
            VALUES ('$train_id', '$from_station', '$to_station', '$fare')";

    if (mysqli_query($con, $sql)) {
        echo "<script>alert('Fare added successfully'); window.location='add_fare.php?id=$train_id';</script>";
    } else {
        echo "<script>alert('Error adding fare'); window.location='add_fare.php?id=$train_id';</script>";
    }
}
?>
