<?php
session_start();
include 'header.php';
include '../connection.php';
?>

<div class="container py-5">
  <h2 class="text-center mb-4">PRODUCT BOOKING LIST</h2>

  <?php
  $log = $_SESSION['id'];

$str = "SELECT bm.*, 
               m.product_name, 
               m.price, 
               m.image, 
               signup.name AS user_name, 
               signup.phone, 
               signup.address
        FROM book_product bm
        JOIN product m 
            ON bm.product_id = m.id
        JOIN signup 
            ON bm.user_id = signup.login_id
        WHERE m.login_id = '$log' 
          AND bm.status IN ('paid', 'delivered')";
  $result = mysqli_query($con, $str);

  if (mysqli_num_rows($result) > 0) {
  ?>
    <div class="table-responsive">
      <table class="table table-bordered table-hover table-striped align-middle">
        <thead class="table-dark">
          <tr>
            <th scope="col">Product Details</th>
            <th scope="col">User Details</th>
            <th scope="col">Total Price</th>
            <th scope="col">Image</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
        <?php while ($data = mysqli_fetch_array($result)) { ?>
            <tr>
            <!-- Product Details -->
            <td>
                <?php echo htmlspecialchars($data['product_name']); ?><br>
                Price: ₹<?php echo htmlspecialchars($data['price']); ?><br>
                Qty: <?php echo htmlspecialchars($data['quantity']); ?>
            </td>

            <!-- User Details -->
            <td>
                <?php echo htmlspecialchars($data['user_name']); ?><br>
                <?php echo htmlspecialchars($data['address']); ?><br>
                <?php echo htmlspecialchars($data['phone']); ?>
            </td>

            <!-- Total Price -->
            <td>$<?php echo htmlspecialchars($data['total']); ?></td>

            <!-- Image -->
            <td>
                <img src="../uploads/<?php echo htmlspecialchars($data['image']); ?>" 
                    width="80" height="80" style="object-fit:cover;">
            </td>

            <!-- Status -->
            <td><?php echo htmlspecialchars($data['status']); ?></td>

            <!-- Action -->
            <td>
                <?php if ($data['status'] === 'paid') { ?>
                    <a href="update_status.php?id=<?php echo $data['id']; ?>&status=delivered" 
                    class="btn btn-primary btn-sm">Mark as Delivered</a>
                <?php } elseif ($data['status'] === 'delivered') { ?>
                    <span class="badge bg-success">Delivered</span>
                <?php } ?>
            </td>
            </tr>
        <?php } ?>
        </tbody>
      </table>
    </div>
  <?php
  } else {
    echo "<h4 class='text-center text-danger mt-5'>Menu not found</h4>";
  }
  ?>
</div>

<?php include 'footer.php'; ?>
