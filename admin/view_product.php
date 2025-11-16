<?php
session_start();
include 'header.php';
include '../connection.php';
?>

<?php
// Handle deletion
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $str = "DELETE FROM product WHERE id='$id'";
    if (mysqli_query($con, $str)) {
        echo "<script>alert('Product deleted successfully'); window.location='view_product.php';</script>";
    } else {
        echo "<script>alert('Product not deleted'); window.location='view_product.php';</script>";
    }
}
?>

<div class="container py-5">
  <h2 class="text-center mb-4">PRODUCT LIST</h2>

  <form method="GET" action="" class="mb-4 d-flex justify-content-center">
    <div class="input-group input-group-sm" style="max-width: 450px;">
      <input type="text" name="search" class="form-control" placeholder="Search Product or description"
             value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">&nbsp;
      <button class="btn btn-danger" type="submit">Go</button>
    </div>
  </form>

  <?php
  $search = '';
  if (isset($_GET['search']) && !empty(trim($_GET['search']))) {
      $search = mysqli_real_escape_string($con, trim($_GET['search']));
      $str = "SELECT product.id AS product_id, product.*, login.* 
              FROM product 
              LEFT JOIN login ON login.id = product.login_id 
              WHERE product.product_name LIKE '%$search%' 
                 OR product.description LIKE '%$search%'";
  } else {
      $str = "SELECT product.id AS product_id, product.*, login.* 
              FROM product 
              LEFT JOIN login ON login.id = product.login_id";
  }

  $result = mysqli_query($con, $str);

  if (mysqli_num_rows($result) > 0) {
  ?>
    <div class="table-responsive">
      <table class="table table-bordered table-hover table-striped align-middle">
        <thead class="table-dark">
          <tr>
            <th scope="col">Product Name</th>
            <th scope="col">Description</th>
            <th scope="col">Quantity</th>
            <th scope="col">Price</th>
            <th scope="col">Image</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
          </tr>
        </thead>
        <tbody>
          <?php while ($data = mysqli_fetch_array($result)) { ?>
            <tr>
              <td><?php echo htmlspecialchars($data['product_name']); ?></td>
              <td><?php echo htmlspecialchars($data['description']); ?></td>
              <td><?php echo (int)$data['quantity']; ?></td>
              <td>₹<?php echo number_format($data['price'], 2); ?></td>
              <td>
                <?php if (!empty($data['image'])) { ?>
                  <img src="../uploads/<?php echo htmlspecialchars($data['image']); ?>" width="80" height="80" class="rounded" style="object-fit:cover;">
                <?php } else { echo 'No Image'; } ?>
              </td>
              <td>
                <a href="edit_product.php?id=<?php echo $data['product_id']; ?>" class="btn btn-sm btn-primary">Edit</a>
              </td>
              <td>
                <a href="?id=<?php echo $data['product_id']; ?>" class="btn btn-sm btn-danger"
                   onclick="return confirm('Are you sure you want to delete this product?');">Delete</a>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  <?php
  } else {
      echo "<h4 class='text-center text-danger mt-5'>Product not found</h4>";
  }
  ?>
</div>

<br><br><br><br><br>

<?php include 'footer.php'; ?>
