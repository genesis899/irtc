<?php include 'header.php'; ?>

<!-- User Signup Section -->
<section id="user-signup" class="user-signup section py-5">

  <div class="container">
    <div class="row g-0 align-items-center">

      <!-- Image Column -->

      <!-- Form Column -->
      <div class="col-lg-7 p-5 bg-white shadow-sm">

        <div class="text-center mb-4">
          <h2><b>FEEDBACK</b></h2>
        </div>

        <form action="feedback_action.php" method="post">
          <div class="mb-3">
            <input type="text" name="subject" class="form-control form-control-lg rounded-3" placeholder="Subject" required>
          </div>

          <div class="mb-3">
            <textarea name="feedback" class="form-control form-control-lg rounded-3" rows="4" placeholder="feedback"></textarea>
          </div>

          <div class="text-center">
            <button type="submit" class="btn btn-danger btn-lg px-5 rounded-pill">SUBMIT</button>
          </div>
        </form>

      </div>
    </div>
  </div>

</section>

<?php include 'footer.php'; ?>
