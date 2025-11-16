<?php
session_start();
include 'header.php';
include '../connection.php';

// Validate menu ID
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo "<h4 class='text-center text-danger mt-5'>Invalid menu item.</h4>";
    include 'footer.php';
    exit;
}

$id = intval($_GET['id']);
$str = "SELECT * FROM menu WHERE id='$id' AND status='approved'";
$result = mysqli_query($con, $str);

if (mysqli_num_rows($result) == 1) {
    $data = mysqli_fetch_assoc($result);
    $available_qty = (int)$data['quantity'];
    ?>
    
    <section class="py-5" style="background: linear-gradient(to right, #f8f9fa, #e9ecef); min-height: 100vh;">
      <div class="container">
        <div class="card shadow-lg border-0 rounded-4 p-4">
          <div class="row g-4 align-items-center">
            
            <!-- Image Column -->
            <div class="col-md-6">
              <img src="../uploads/<?php echo htmlspecialchars($data['image']); ?>" 
                   alt="<?php echo htmlspecialchars($data['food_name']); ?>" 
                   class="img-fluid rounded-4 shadow-sm" 
                   style="object-fit: cover; max-height: 400px; width: 100%;">
            </div>

            <!-- Info Column -->
            <div class="col-md-6">
              <h2 class="text-primary fw-bold mb-3"><?php echo htmlspecialchars($data['food_name']); ?></h2>
              <p class="text-muted mb-4"><?php echo nl2br(htmlspecialchars($data['description'])); ?></p>

              <ul class="list-group mb-4">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  <strong>Available Quantity:</strong>
                  <span class="badge bg-info text-dark rounded-pill">
                    <?php echo $available_qty; ?>
                  </span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  <strong>Price:</strong>
                  <span class="badge bg-warning text-dark rounded-pill">₹<?php echo htmlspecialchars($data['price']); ?></span>
                </li>
              </ul>

              <?php if ($available_qty > 0) { ?>
                <!-- Booking Form -->
                <form action="book_menu.php" method="POST" class="d-flex flex-column gap-3">
                  <input type="hidden" name="menu_id" value="<?php echo $data['id']; ?>">

                  <div class="form-group">
                    <label for="quantity" class="form-label fw-bold">Quantity:</label>
                    <input type="number" 
                           name="quantity" 
                           id="quantity" 
                           class="form-control" 
                           value="1" 
                           min="1" 
                           max="<?php echo $available_qty; ?>" 
                           required>
                    <small class="text-muted">
                      You can book up to <?php echo $available_qty; ?> item(s).
                    </small>
                  </div>

                  <div class="d-flex flex-wrap gap-2">
                    <button type="submit" class="btn btn-success btn-lg px-4">
                      <i class="bi bi-cart-check"></i> Book Menu
                    </button>
                    <a href="view_menu.php" class="btn btn-outline-secondary btn-lg px-4">
                      <i class="bi bi-arrow-left"></i> Back to Menu
                    </a>
                  </div>
                </form>
              <?php } else { ?>
                <!-- Sold Out Message -->
                <div class="alert alert-danger text-center fw-bold py-3 rounded">
                  SOLD OUT
                </div>
                <a href="view_menu.php" class="btn btn-outline-secondary btn-lg mt-3 px-4">
                  <i class="bi bi-arrow-left"></i> Back to Menu
                </a>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </section>

<?php
} else {
    echo "<h4 class='text-center text-danger mt-5'>Menu item not found.</h4>";
}

include 'footer.php';
?>
