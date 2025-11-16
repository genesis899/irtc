<?php
session_start();
include '../connection.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $user_id = $_SESSION['id'];
    $fare_id = $_POST['fare_id'];
    $train_id = $_POST['train_id'];
    $passenger_name = $_POST['passenger_name'];
    $journey_date = $_POST['journey_date'];
    $tickets = intval($_POST['tickets']);
    $total_amount = $_POST['total_amount'];

    $seat_query = "SELECT seat_number FROM bookings 
                   WHERE train_id='$train_id' AND journey_date='$journey_date'
                   ORDER BY id DESC LIMIT 1";
    $seat_result = mysqli_query($con, $seat_query);

    $last_seat_no = 0;
    if ($seat_row = mysqli_fetch_assoc($seat_result)) {
        $seats = explode(",", $seat_row['seat_number']);
        $last_seat_no = intval(substr(end($seats), 1));
    }

    $seat_numbers = [];
    for ($i = 1; $i <= $tickets; $i++) {
        $last_seat_no++;
        $seat_numbers[] = "S" . $last_seat_no;
    }
    $seat_string = implode(",", $seat_numbers);

    $sql = "INSERT INTO bookings(user_id, train_id, fare_id, passenger_name, journey_date, tickets, total_amount, seat_number) 
            VALUES('$user_id','$train_id','$fare_id','$passenger_name','$journey_date','$tickets','$total_amount','$seat_string')";

    if (mysqli_query($con, $sql)) {
        echo "<script>alert('Booking Successful! Seats: $seat_string'); window.location='view_train_booking.php';</script>";
    } else {
        echo "<script>alert('Booking Failed! Try Again.'); window.location='view_train.php';</script>";
    }
}
?>
