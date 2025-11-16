<?php include 'header.php'; ?>

<!-- Contact Us Section -->
<section id="contact-us" class="contact-us section py-5">

  <div class="container">
    <div class="row g-0 align-items-center">

       <!-- Image Column  -->
      <div class="col-lg-5 contact-img" style="background-image: url(assets/img/5.jpg); background-size: cover; background-position: center; min-height: 400px;">
      </div> 
     
      <!-- Form Column -->
      <div class="col-lg-7 p-5 bg-white shadow-sm">

        <div class="text-center mb-4">
          <h2><b>LOGIN</b></h2>
        </div>

        <form action="login_action.php" method="post">
          <div class="mb-3">
            <input type="text" name="username" class="form-control form-control-lg rounded-3" placeholder="Username" required>
          </div>

          <div class="mb-3">
            <input type="password" name="password" class="form-control form-control-lg rounded-3" placeholder="Password" required>
          </div>

          <div class="text-center">
            <button type="submit" class="btn btn-danger btn-lg px-5 rounded-pill">LOGIN</button>
          </div>
        </form>

      </div>
    </div>
  </div>

</section>

<?php include 'footer.php'; ?>
