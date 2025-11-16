<?php
session_start();
include 'header.php';
include '../connection.php';
?>

<div class="container py-5">
  <h2 class="text-center mb-4">PRODUCT Booking List</h2>

  <?php if (isset($_GET['msg'])): ?>
    <div class="alert alert-success text-center">
      <?php echo htmlspecialchars($_GET['msg']); ?>
    </div>
  <?php endif; ?>

  <?php
  $log = $_SESSION['id'];
  $str = "SELECT bp.*, p.product_name, p.price, p.image 
          FROM book_product bp 
          JOIN product p ON bp.product_id = p.id 
          WHERE bp.user_id = '$log'";
  $result = mysqli_query($con, $str);

  if (mysqli_num_rows($result) > 0) {
    $grand_total = 0;
  ?>
    <div class="table-responsive">
      <table class="table table-bordered table-hover table-striped align-middle">
        <thead class="table-dark">
          <tr>
            <th scope="col">Product Name</th>
            <th scope="col">Price</th>
            <th scope="col">Quantity</th>
            <th scope="col">Total Price</th>
            <th scope="col">Image</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php while ($data = mysqli_fetch_array($result)) { 
            if ($data['status'] === 'pending') {
              $grand_total += $data['total'];
            }
          ?>
            <tr>
              <td><?php echo htmlspecialchars($data['product_name']); ?></td>
              <td>₹<?php echo htmlspecialchars($data['price']); ?></td>
              <td><?php echo htmlspecialchars($data['quantity']); ?></td>
              <td>₹<?php echo htmlspecialchars($data['total']); ?></td>
              <td>
                <img src="../uploads/<?php echo htmlspecialchars($data['image']); ?>" width="80" height="80" style="object-fit:cover;">
              </td>
              <td>
                <?php if ($data['status'] === 'pending') { ?>
                  <a href="pay_product.php?id=<?php echo $data['id']; ?>" class="btn btn-success btn-sm mb-1">Pay Now</a>
                  <a href="cancel_product.php?id=<?php echo $data['id']; ?>" class="btn btn-danger btn-sm">Cancel</a>
                <?php } else { ?>
                  <span class="badge bg-secondary"><?php echo htmlspecialchars(ucfirst($data['status'])); ?></span>
                <?php } ?>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>

    <?php if ($grand_total > 0) { ?>
      <div class="text-end mt-3">
        <h4><strong>Grand Total: ₹<?php echo $grand_total; ?></strong></h4>
        <form action="pay_all_product.php" method="post">
          <button type="submit" class="btn btn-primary">Pay All</button>
        </form>
      </div>
    <?php } ?>

  <?php
  } else {
    echo "<h4 class='text-center text-danger mt-5'>No products found in your booking list.</h4>";
  }
  ?>
</div>

<?php include 'footer.php'; ?>
