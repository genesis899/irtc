<?php include 'header.php'; ?>

<!-- Contact Us Section -->
<section id="contact-us" class="contact-us section py-0">
  <div class="container">
    <div class="row justify-content-center align-items-center min-vh-100">

      <!-- Image Column -->
      <!-- Form Column -->
      <div class="col-lg-6 p-5 bg-white shadow-sm rounded-4">

        <div class="text-center mb-4">
          <h2><b>Availability</b></h2>
        </div>

        <form action="availability_action.php" method="post">
          <div class="mb-4">
            <select name="availability" class="form-select form-select-lg rounded-3" required>
              <option value="" disabled selected>Select availability</option>
              <option value="available">Available</option>
              <option value="unavailable">Unavailable</option>
            </select>
          </div>

          <div class="text-center">
            <button type="submit" class="btn btn-danger btn-lg px-5 rounded-pill">UPDATE</button>
          </div>
        </form>

      </div>
    </div>
  </div>
</section>

<?php include 'footer.php'; ?>
