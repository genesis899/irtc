<?php include 'header.php'; ?>

<!-- Doctor Signup Section -->
<section id="user-signup" class="user-signup section py-5">

  <div class="container">
    <div class="row g-0 align-items-center">

      <!-- Image Column -->
      <div class="col-lg-5 signup-img" style="background-image: url(assets/img/6.jpg); background-size: cover; background-position: center; min-height: 400px;">
      </div>

      <!-- Form Column -->
      <div class="col-lg-7 p-5 bg-white shadow-sm">

        <div class="text-center mb-4">
          <h2><b>DOCTOR SIGNUP</b></h2>
        </div>

        <form action="doctor_signup_action.php" method="post" enctype="multipart/form-data">

          <!-- Name -->
          <div class="mb-3">
            <input type="text" 
                   name="name" 
                   class="form-control form-control-lg rounded-3" 
                   placeholder="Your Name" 
                   pattern="^[A-Za-z\s]{3,50}$" 
                   title="Name should only contain letters and spaces (3-50 characters)" 
                   required>
          </div>

          <!-- Email -->
          <div class="mb-3">
            <input type="email" 
                   name="email" 
                   class="form-control form-control-lg rounded-3" 
                   placeholder="Your Email" 
                   required>
          </div>

          <!-- Phone -->
          <div class="mb-3">
            <input type="text" 
                   name="phone" 
                   class="form-control form-control-lg rounded-3" 
                   placeholder="Your Phone" 
                   pattern="^[6-9][0-9]{9}$" 
                   maxlength="10" 
                   title="Phone must start with 6, 7, 8, or 9 and be exactly 10 digits" 
                   required>
          </div>

          <!-- Address -->
          <div class="mb-3">
            <textarea name="address" 
                      class="form-control form-control-lg rounded-3" 
                      rows="4" 
                      placeholder="Address" 
                      required></textarea>
          </div>

          <!-- Profile Image -->
          <div class="mb-3">
            <label><b>IMAGE</b></label>
            <input type="file" 
                   name="image" 
                   class="form-control form-control-lg rounded-3" 
                   accept=".jpg,.jpeg,.png" 
                   title="Please upload a JPG or PNG image" 
                   required>
          </div>

          <!-- Experience Certificate -->
          <div class="mb-3">
            <label><b>EXPERIENCE CERTIFICATE</b></label>
            <input type="file" 
                   name="experience" 
                   class="form-control form-control-lg rounded-3" 
                   accept=".pdf" 
                   title="Please upload a PDF file" 
                   required>
          </div>

          <!-- Username -->
          <div class="mb-3">
            <input type="text" 
                   name="username" 
                   class="form-control form-control-lg rounded-3" 
                   placeholder="Username" 
                   pattern="^[A-Za-z0-9_]{4,20}$" 
                   title="Username should be 4-20 characters, letters, numbers, or underscores only" 
                   required>
          </div>

          <!-- Password -->
          <div class="mb-3">
            <input type="password" 
                   name="password" 
                   class="form-control form-control-lg rounded-3" 
                   placeholder="Password" 
                   pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d@$!%*?&]{6,}$" 
                   title="Password must be at least 6 characters, contain letters and numbers" 
                   required>
          </div>

          <div class="text-center">
            <button type="submit" class="btn btn-danger btn-lg px-5 rounded-pill">SIGNUP</button>
          </div>
        </form>

      </div>
    </div>
  </div>

</section>

<?php include 'footer.php'; ?>
