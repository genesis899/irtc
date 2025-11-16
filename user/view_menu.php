<?php
session_start();
include 'header.php';
include '../connection.php';
?>

<!-- Attractive Section with Gradient Background -->
<section class="py-5" style="background: linear-gradient(to right, #f8f9fa, #e9ecef); min-height: 100vh;">
  <div class="container">
    <h2 class="text-center mb-4 text-uppercase fw-bold text-danger">Our Delicious Menu</h2>


    <?php
    $str = "SELECT * FROM menu WHERE status='approved'";
    $result = mysqli_query($con, $str);

    if (mysqli_num_rows($result) > 0) {
    ?>
      <div class="row g-4">
        <?php while ($data = mysqli_fetch_array($result)) { ?>
          <div class="col-md-4">
            <div class="card h-100 shadow-sm border-0 rounded-4 overflow-hidden position-relative hover-shadow" style="transition: all 0.3s ease-in-out;">
              <img src="../uploads/<?php echo htmlspecialchars($data['image']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($data['food_name']); ?>" style="height: 220px; object-fit: cover;">

              <div class="card-body d-flex flex-column bg-white">
                <h5 class="card-title text-primary"><?php echo htmlspecialchars($data['food_name']); ?></h5>
                <p class="card-text small text-muted mb-3"><?php echo htmlspecialchars($data['description']); ?></p>

                <div class="mb-3">
                  <!-- <span class="badge bg-success me-2"><i class="bi bi-box-seam"></i> Qty: <?php echo htmlspecialchars($data['quantity']); ?></span> -->
                  <span class="badge bg-warning text-dark">₹<?php echo htmlspecialchars($data['price']); ?></span>
                </div>

                <a href="view_single_menu.php?id=<?php echo $data['id']; ?>" class="btn btn-outline-danger mt-auto w-100 rounded-pill">
                  <i class="bi bi-eye"></i> View More
                </a>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
    <?php
    } else {
      echo "<h4 class='text-center text-danger mt-5'>Menu not found</h4>";
    }
    ?>
  </div>
</section>

<?php include 'footer.php'; ?>
