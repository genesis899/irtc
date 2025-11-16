<?php
session_start();
include 'header.php';
include '../connection.php';
?>

<div class="container py-5">
  <h2 class="text-center mb-4">PRODUCT LIST</h2>

  <?php
  $str = "SELECT * FROM product";
  $result = mysqli_query($con, $str);

  if (mysqli_num_rows($result) > 0) {
  ?>
    <div class="row g-4">
      <?php while ($data = mysqli_fetch_array($result)) { ?>
        <div class="col-md-4">
          <div class="card h-100 shadow-sm">
            <img src="../uploads/<?php echo htmlspecialchars($data['image']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($data['product_name']); ?>" style="height: 200px; object-fit: cover;">
            <div class="card-body d-flex flex-column">
              <h5 class="card-title"><?php echo htmlspecialchars($data['product_name']); ?></h5>
              <p class="card-text text-truncate" style="max-height: 3em; overflow: hidden;"><?php echo htmlspecialchars($data['description']); ?></p>
              <ul class="list-group list-group-flush mb-3">
                <!-- <li class="list-group-item"><strong>Quantity:</strong> <?php echo htmlspecialchars($data['quantity']); ?></li> -->
                <li class="list-group-item"><strong>Price:</strong> ₹<?php echo htmlspecialchars($data['price']); ?></li>
              </ul>
              <a href="view_single_product.php?id=<?php echo $data['id']; ?>" class="btn btn-danger mt-auto">View More</a>
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

<?php include 'footer.php'; ?>
