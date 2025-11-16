<?php include 'header.php'; ?>

<!-- User Signup Section -->
<section id="user-signup" class="user-signup section py-5">

  <div class="container">
    <div class="row g-0 align-items-center">

      <!-- Image Column -->
      <div class="col-lg-5 signup-img" style="background-image: url(assets/img/6.jpg); background-size: cover; background-position: center; min-height: 400px;">
      </div>

      <!-- Form Column -->
      <div class="col-lg-7 p-5 bg-white shadow-sm">

        <div class="text-center mb-4">
          <h2><b>ADD MENU</b></h2>
        </div>

        <form action="add_menu_action.php" method="post" enctype="multipart/form-data">
          <div class="mb-3">
            <input type="text" name="food_name" class="form-control form-control-lg rounded-3" placeholder="Food Name" required>
          </div>
          <div class="mb-3">
            <textarea name="description" class="form-control form-control-lg rounded-3" rows="4" placeholder="Description"></textarea>
          </div>
          <div class="mb-3">
            <label>IMAGE</label>
            <input type="file" name="image" class="form-control form-control-lg rounded-3" placeholder="image" accept=".jpg,.png" required>
          </div>
        <div class="mb-3">
            <input type="text" name="quantity" class="form-control form-control-lg rounded-3" placeholder="Quantity"  required>
          </div>
          <div class="mb-3">
            <input type="number" name="price" class="form-control form-control-lg rounded-3" placeholder="Price" required>
          </div>

          <div class="text-center">
            <button type="submit" class="btn btn-danger btn-lg px-5 rounded-pill">ADD NOW</button>
          </div>
        </form>

      </div>
    </div>
  </div>

</section>

<?php include 'footer.php'; ?>