<?php
session_start();
include '../connection.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $fare_id = intval($_POST['fare_id']);
    $train_id = intval($_POST['train_id']);
    $passenger_name = $_POST['passenger_name'];
    $journey_date = $_POST['journey_date'];
    $tickets = intval($_POST['tickets']);

    // Fetch fare
    $fare_sql = "SELECT fare FROM fares WHERE id='$fare_id'";
    $fare_result = mysqli_query($con, $fare_sql);
    $fare_data = mysqli_fetch_assoc($fare_result);
    $fare_amount = $fare_data['fare'];

    $total_amount = $fare_amount * $tickets;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Train Ticket Payment</title>
  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body class="bg-light">

<div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-md-8 col-lg-6">
      <div class="card shadow-lg border-0 rounded-4">
        <div class="card-header bg-primary text-white text-center rounded-top-4">
          <h4 class="mb-0">Payment Details</h4>
        </div>
        <div class="card-body p-4">

          <!-- Booking Summary -->
          <div class="mb-4">
            <h5 class="fw-bold">Booking Summary</h5>
            <ul class="list-group">
              <li class="list-group-item d-flex justify-content-between">
                <span>Passenger</span> <span><?php echo htmlspecialchars($passenger_name); ?></span>
              </li>
              <li class="list-group-item d-flex justify-content-between">
                <span>Journey Date</span> <span><?php echo htmlspecialchars($journey_date); ?></span>
              </li>
              <li class="list-group-item d-flex justify-content-between">
                <span>No. of Tickets</span> <span><?php echo $tickets; ?></span>
              </li>
              <li class="list-group-item d-flex justify-content-between fw-bold">
                <span>Total Amount</span> <span>₹<?php echo $total_amount; ?></span>
              </li>
            </ul>
          </div>

          <!-- Payment Form -->
          <form action="payment_process.php" method="POST">
            <input type="hidden" name="fare_id" value="<?php echo $fare_id; ?>">
            <input type="hidden" name="train_id" value="<?php echo $train_id; ?>">
            <input type="hidden" name="passenger_name" value="<?php echo $passenger_name; ?>">
            <input type="hidden" name="journey_date" value="<?php echo $journey_date; ?>">
            <input type="hidden" name="tickets" value="<?php echo $tickets; ?>">
            <input type="hidden" name="total_amount" value="<?php echo $total_amount; ?>">

            <div class="mb-3">
              <label class="form-label fw-semibold">Card Holder Name</label>
              <input type="text" class="form-control form-control-lg" placeholder="John Doe" required>
            </div>

            <div class="mb-3">
              <label class="form-label fw-semibold">Card Number</label>
              <div class="input-group">
                <input type="text" class="form-control form-control-lg" placeholder="1234 5678 9012 3456" maxlength="16" required>
                <span class="input-group-text bg-white">
                  <i class="fab fa-cc-visa fa-lg text-primary me-1"></i>
                  <i class="fab fa-cc-mastercard fa-lg text-danger me-1"></i>
                  <i class="fab fa-cc-amex fa-lg text-info"></i>
                </span>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6 mb-3">
                <label class="form-label fw-semibold">Expiry</label>
                <input type="text" class="form-control form-control-lg" placeholder="MM/YY" required>
              </div>
              <div class="col-md-6 mb-3">
                <label class="form-label fw-semibold">CVV</label>
                <input type="password" class="form-control form-control-lg" placeholder="***" maxlength="3" required>
              </div>
            </div>

            <button type="submit" class="btn btn-success btn-lg w-100 rounded-pill">
              <i class="fas fa-lock me-2"></i> Pay ₹<?php echo $total_amount; ?>
            </button>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
