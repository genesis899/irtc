<?php
session_start();
include 'header.php';
include '../connection.php';

if (!isset($_SESSION['id'])) {
    echo "<script>alert('Please login as admin first'); window.location='../login.php';</script>";
    exit;
}

$sql = "SELECT b.*, 
               u.name, 
               t.name AS train_name, 
               t.train_no, 
               f.from_station, 
               f.to_station 
        FROM bookings b
        JOIN signup u ON b.user_id = u.login_id
        JOIN train t ON b.train_id = t.id
        JOIN fares f ON b.fare_id = f.id
        ORDER BY b.booking_date DESC";

$result = mysqli_query($con, $sql);
?>

<div class="container py-5">
  <h2 class="text-center mb-4">Train Bookings</h2>

  <?php if (mysqli_num_rows($result) > 0) { ?>
    <div class="table-responsive">
      <table class="table table-bordered table-hover align-middle shadow-sm">
        <thead class="table-dark">
          <tr>
            <th>#</th>
            <th>User</th>
            <th>Train</th>
            <th>Train No</th>
            <th>From</th>
            <th>To</th>
            <th>Passenger</th>
            <th>Journey Date</th>
            <th>Tickets</th>
            <th>Total Amount</th>
            <th>Booking Date</th>
            <th>Seat Numbers</th>
          </tr>
        </thead>
        <tbody>
          <?php 
          $i = 1;
          while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
              <td><?php echo $i++; ?></td>
              <td><?php echo $row['name']; ?></td>
              <td><?php echo $row['train_name']; ?></td>
              <td><?php echo $row['train_no']; ?></td>
              <td><?php echo $row['from_station']; ?></td>
              <td><?php echo $row['to_station']; ?></td>
              <td><?php echo htmlspecialchars($row['passenger_name']); ?></td>
              <td><?php echo $row['journey_date']; ?></td>
              <td><?php echo $row['tickets']; ?></td>
              <td>₹<?php echo $row['total_amount']; ?></td>
              <td><?php echo $row['booking_date']; ?></td>
              <td><?php echo $row['seat_number']; ?></td>
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
