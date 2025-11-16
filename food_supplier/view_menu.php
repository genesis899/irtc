<?php
session_start();
include 'header.php';
include '../connection.php';
?>

<?php
if(isset($_GET['id'])){
    $id = intval($_GET['id']);
    $str = "DELETE FROM menu WHERE id='$id'";
    if(mysqli_query($con, $str)){
        echo "<script>alert('Menu deleted successfully'); window.location='view_menu.php';</script>";
    } else {
        echo "<script>alert('Menu not deleted'); window.location='view_menu.php';</script>";
    }
}
?>

<div class="container py-5">
  <h2 class="text-center mb-4">MENU List</h2>

  <?php
  $str = "SELECT menu.id AS menu_id, menu.*, login.* FROM menu, login WHERE login.id = menu.supplier_id";
  $result = mysqli_query($con, $str);

  if (mysqli_num_rows($result) > 0) {
  ?>
    <div class="table-responsive">
      <table class="table table-bordered table-hover table-striped align-middle">
        <thead class="table-dark">
          <tr>
            <th scope="col">Food Name</th>
            <th scope="col">Description</th>
            <th scope="col">Quantity</th>
            <th scope="col">Price</th>
            <th scope="col">Image</th>
            <th scope="col">Status</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
          </tr>
        </thead>
        <tbody>
          <?php while ($data = mysqli_fetch_array($result)) { ?>
            <tr>
              <td><?php echo htmlspecialchars($data['food_name']); ?></td>
              <td><?php echo htmlspecialchars($data['description']); ?></td>
              <td><?php echo htmlspecialchars($data['quantity']); ?></td>
              <td>₹<?php echo htmlspecialchars($data['price']); ?></td>
              <td>
                <img src="../uploads/<?php echo htmlspecialchars($data['image']); ?>" width="80" height="80" style="object-fit:cover;">
              </td>
              <td><?php echo htmlspecialchars($data['status']); ?></td>
              <td>
                <a href="edit_menu.php?id=<?php echo $data['menu_id']; ?>" class="btn btn-primary btn-sm">Edit</a>
              </td>
              <td>
                <a href="?id=<?php echo $data['menu_id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this menu item?');">Delete</a>
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
