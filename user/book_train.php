<?php
session_start();
include 'header.php';
include '../connection.php';

if (!isset($_GET['fare_id'])) {
    echo "<script>alert('Invalid request'); window.location='view_train.php';</script>";
    exit;
}

$fare_id = intval($_GET['fare_id']);
$query = "SELECT fares.*, train.train_no, train.name, train.image 
          FROM fares 
          JOIN train ON fares.train_id = train.id 
          WHERE fares.id = $fare_id";
$result = mysqli_query($con, $query);
$fare = mysqli_fetch_assoc($result);
?>

<div class="container py-5">
  <h2 class="mb-4">Book Train Ticket</h2>

  <div class="card mb-4">
    <div class="card-body">
      <h5><?php echo $fare['name']; ?> (<?php echo $fare['train_no']; ?>)</h5>
      <p><b>From:</b> <?php echo $fare['from_station']; ?>  
         <b>To:</b> <?php echo $fare['to_station']; ?></p>
      <p><b>Fare:</b> ₹<?php echo $fare['fare']; ?></p>
      <img src="../uploads/<?php echo $fare['image']; ?>" width="120" height="120" class="rounded" style="object-fit:cover;">
    </div>
  </div>

  <form action="book_train_action.php" method="POST">
    <input type="hidden" name="fare_id" value="<?php echo $fare_id; ?>">
    <input type="hidden" name="train_id" value="<?php echo $fare['train_id']; ?>">

    <div class="mb-3">
      <label>Passenger Name</label>
      <input type="text" name="passenger_name" class="form-control" required>
    </div>

    <div class="mb-3">
      <label>Journey Date</label>
      <input type="date" name="journey_date" class="form-control" required>
    </div>

    <div class="mb-3">
      <label>No. of Tickets</label>
      <input type="number" name="tickets" class="form-control" min="1" required>
    </div>

    <button type="submit" class="btn btn-success">Confirm Booking</button>
  </form>
</div>

<?php include 'footer.php'; ?>
