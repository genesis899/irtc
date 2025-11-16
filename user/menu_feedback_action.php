<?php
session_start();
include '../connection.php'; 

$subject  = $_POST['subject'];
$feedback = $_POST['feedback'];
$menu_id  = $_POST['menu_id'];
$log      = $_SESSION['id'];

$sql = "INSERT INTO menu_feedback(subject, feedback, menu_id, user_id) 
        VALUES('$subject', '$feedback', '$menu_id', '$log')";

if(mysqli_query($con, $sql)){
    echo "<script>alert('Feedback submitted successfully'); window.location='index.php';</script>";
} else {
    echo "Error: " . mysqli_error($con);
}
?>
