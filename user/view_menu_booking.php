<?php
session_start();
include 'header.php';
include '../connection.php';
?>

<div class="container py-5">
  <h2 class="text-center mb-4">MENU List</h2>

  <!-- Success Message -->
  <?php if (isset($_GET['msg'])): ?>
    <div class="alert alert-success text-center">
      <?php echo htmlspecialchars($_GET['msg']); ?>
    </div>
  <?php endif; ?>

  <?php
  $log = $_SESSION['id'];
  $str = "SELECT bm.*, m.food_name, m.price, m.image 
          FROM book_menu bm 
          JOIN menu m ON bm.menu_id = m.id 
          WHERE bm.user_id = '$log'";
  $result = mysqli_query($con, $str);

  if (mysqli_num_rows($result) > 0) {
  ?>
    <div class="table-responsive">
      <table class="table table-bordered table-hover table-striped align-middle">
        <thead class="table-dark">
          <tr>
            <th scope="col">Food Name</th>
            <th scope="col">Price</th>
            <th scope="col">Quantity</th>
            <th scope="col">Total Price</th>
            <th scope="col">Image</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php 
            $grand_total = 0;
            mysqli_data_seek($result, 0); // Ensure pointer is at start

            while ($data = mysqli_fetch_array($result)) {
              if ($data['status'] === 'pending') {
                $grand_total += $data['total'];
              }
          ?>
            <tr>
              <td><?php echo htmlspecialchars($data['food_name']); ?></td>
              <td>₹<?php echo htmlspecialchars($data['price']); ?></td>
              <td><?php echo htmlspecialchars($data['quantity']); ?></td>
              <td>₹<?php echo htmlspecialchars($data['total']); ?></td>
              <td>
                <img src="../uploads/<?php echo htmlspecialchars($data['image']); ?>" width="80" height="80" style="object-fit:cover;">
              </td>
              <td>
                <?php if ($data['status'] === 'pending') { ?>
                  <a href="pay_menu.php?id=<?php echo $data['id']; ?>" class="btn btn-success btn-sm mb-1">Pay Now</a>
                  <a href="cancel_menu.php?id=<?php echo $data['id']; ?>" class="btn btn-danger btn-sm">Cancel</a>
                <?php } else { ?>
                  <span class="badge bg-secondary"><?php echo htmlspecialchars(ucfirst($data['status'])); ?></span><br><br>  
                  <a href="add_menu_feedback.php?id=<?php echo $data['id']; ?>" class="btn btn-success btn-sm">Add Feedback</a>
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
        <form action="pay_all_menu.php" method="post">
          <input type="hidden" name="user_id" value="<?php echo $log; ?>">
          <button type="submit" class="btn btn-primary">Pay All</button>
        </form>
      </div>
    <?php } ?>

  <?php
  } else {
    echo "<h4 class='text-center text-danger mt-5'>Menu not found</h4>";
  }
  ?>
</div>

<?php include 'footer.php'; ?>
