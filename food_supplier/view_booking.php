<?php
session_start();
include 'header.php';
include '../connection.php';
?>

<div class="container py-5">
  <h2 class="text-center mb-4">BOOKING LIST</h2>

  <?php
  $log = $_SESSION['id'];

  $str = "SELECT bm.*, 
                 m.food_name, 
                 m.price, 
                 m.image,
                 signup.name AS user_name,
                 signup.phone,
                 signup.address
          FROM book_menu bm 
          JOIN menu m ON bm.menu_id = m.id 
          JOIN signup ON bm.user_id = signup.login_id
          WHERE m.supplier_id = '$log' 
            AND bm.status IN ('paid', 'delivered')";
  $result = mysqli_query($con, $str);

  if (mysqli_num_rows($result) > 0) {
  ?>
    <div class="table-responsive">
      <table class="table table-bordered table-hover table-striped align-middle">
        <thead class="table-dark">
          <tr>
            <th scope="col">Food Details</th>
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
              <td>
                Food Name:<?php echo htmlspecialchars($data['food_name']); ?><br>
                Price:₹<?php echo htmlspecialchars($data['price']); ?><br>
                Quantity:<?php echo htmlspecialchars($data['quantity']); ?>
              </td>

              <td>
                <?php echo htmlspecialchars($data['user_name']); ?><br>
                <?php echo htmlspecialchars($data['phone']); ?><br>
                <?php echo htmlspecialchars($data['address']); ?>
              </td>

              <td>₹<?php echo htmlspecialchars($data['total']); ?></td>
              <td>
                <img src="../uploads/<?php echo htmlspecialchars($data['image']); ?>" width="80" height="80" style="object-fit:cover;">
              </td>
              <td><?php echo htmlspecialchars($data['status']); ?></td>
              <td>
                <?php if ($data['status'] === 'paid') { ?>
                    <a href="update_status.php?id=<?php echo $data['id']; ?>&status=delivered" class="btn btn-primary btn-sm">Mark as Delivered</a>
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
