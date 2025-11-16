<?php 
include 'header.php';

$doctor_id = isset($_GET['id']) ? $_GET['id'] : '';
 ?>

<!-- User Signup Section -->
<section id="user-signup" class="user-signup section py-0">

  <div class="container">
    <div class="row justify-content-center align-items-center min-vh-100">

      <!-- Image Column -->

      <!-- Form Column -->
      <div class="col-lg-7 p-5 bg-white shadow-sm">

        <div class="text-center mb-4">
          <h2><b>BOOK APPOINTMENT</b></h2>
        </div>

        <form action="appointment_action.php" method="post">
            
        <input type="hidden" name="doctor_id" value="<?php echo htmlspecialchars($doctor_id); ?>">

          <div class="mb-3">
            <input type="text" name="name" class="form-control form-control-lg rounded-3" placeholder="Name" required>
          </div>

          <div class="mb-3">
            <input type="text" name="phone" class="form-control form-control-lg rounded-3" placeholder="Phone Number" required>
          </div>

          <div class="mb-3">
            <input type="text" name="coach_no" class="form-control form-control-lg rounded-3" placeholder="Coach Number" required>
          </div>

          <div class="mb-3">
            <input type="text" name="seat_no" class="form-control form-control-lg rounded-3" placeholder="Seat Number" required>
          </div>

          <div class="text-center">
            <button type="submit" class="btn btn-danger btn-lg px-5 rounded-pill">Submit</button>
          </div>
        </form>

      </div>
    </div>
  </div>

</section>

<?php include 'footer.php'; ?>
