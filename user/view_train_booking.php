<?php
session_start();
include 'header.php';
include '../connection.php';

// Ensure user is logged in
if (!isset($_SESSION['id'])) {
    echo "<script>alert('Please login first'); window.location='../login.php';</script>";
    exit;
}

$user_id = $_SESSION['id'];

$sql = "SELECT b.*, 
               t.name AS train_name, 
               t.train_no, 
               t.image, 
               f.from_station, 
               f.to_station 
        FROM bookings b
        JOIN train t ON b.train_id = t.id
        JOIN fares f ON b.fare_id = f.id
        WHERE b.user_id = '$user_id'
        ORDER BY b.booking_date DESC";

$result = mysqli_query($con, $sql);
?>

<div class="container py-5">
  <h2 class="text-center mb-4">My Bookings</h2>

  <?php if (mysqli_num_rows($result) > 0) { ?>
    <div class="table-responsive">
      <table class="table table-bordered table-striped align-middle shadow-sm">
        <thead class="table-dark">
          <tr>
            <th>#</th>
            <th>Train</th>
            <th>Train No</th>
            <th>From</th>
            <th>To</th>
            <th>Passenger</th>
            <th>Journey Date</th>
            <th>Tickets</th>
            <th>Total Amount</th>
            <th>Booking Date</th>
            <th>Seat Number</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php 
          $i = 1;
          while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
              <td><?php echo $i++; ?></td>
              <td>
                <img src="../uploads/<?php echo $row['image']; ?>" width="80" height="60" class="rounded" style="object-fit:cover;">
                <div><?php echo $row['train_name']; ?></div>
              </td>
              <td><?php echo $row['train_no']; ?></td>
              <td><?php echo $row['from_station']; ?></td>
              <td><?php echo $row['to_station']; ?></td>
              <td><?php echo htmlspecialchars($row['passenger_name']); ?></td>
              <td><?php echo $row['journey_date']; ?></td>
              <td><?php echo $row['tickets']; ?></td>
              <td>₹<?php echo $row['total_amount']; ?></td>
              <td><?php echo $row['booking_date']; ?></td>
              <td><?php echo $row['seat_number']; ?></td>
              <td><a href="cancel_train.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm">Cancel</a></td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  <?php } else { ?>
    <h5 class="text-center text-danger mt-5">No bookings found</h5>
  <?php } ?>
</div>

<?php include 'footer.php'; ?>
