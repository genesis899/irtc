<?php
session_start();
include 'header.php';
include '../connection.php';
?>

<?php
// Handle deletion
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $str = "DELETE FROM menu WHERE id='$id'";
    if (mysqli_query($con, $str)) {
        echo "<script>alert('Menu deleted successfully'); window.location='view_menu.php';</script>";
    } else {
        echo "<script>alert('Menu not deleted'); window.location='view_menu.php';</script>";
    }
}
?>

<div class="container py-5">
  <h2 class="text-center mb-4">MENU List</h2>

<form method="GET" action="" class="mb-4 d-flex justify-content-center">
  <div class="input-group input-group-sm" style="max-width: 450px;">
    <input type="text" name="search" class="form-control" placeholder="Search food or description" value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">&nbsp;
    <button class="btn btn-danger" type="submit">Go</button>
  </div>
</form>

  <?php
  $search = '';
  if (isset($_GET['search']) && !empty(trim($_GET['search']))) {
      $search = mysqli_real_escape_string($con, trim($_GET['search']));
      $str = "SELECT * FROM menu WHERE food_name LIKE '%$search%' OR description LIKE '%$search%'";
  } else {
      $str = "SELECT * FROM menu";
  }

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
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php while ($data = mysqli_fetch_array($result)) { ?>
            <tr>
              <td><?php echo $data['food_name']; ?></td>
              <td><?php echo $data['description']; ?></td>
              <td><?php echo $data['quantity']; ?></td>
              <td>₹<?php echo $data['price']; ?></td>
              <td>
                <img src="../uploads/<?php echo $data['image']; ?>" width="80" height="80" class="rounded" style="object-fit:cover;">
              </td>
              <td>
                <?php
                if ($data['status'] == 'approved') {
                  echo '<span class="badge bg-success">Approved</span>';
                } elseif ($data['status'] == 'pending') {
                  echo '<span class="badge bg-warning text-dark">Pending</span>';
                } elseif ($data['status'] == 'rejected') {
                  echo '<span class="badge bg-danger">Rejected</span>';
                }
                ?>
              </td>
              <td>
                <?php if ($data['status'] == 'approved') { ?>
                  <a href="reject_menu.php?id=<?php echo $data['id']; ?>" class="btn btn-sm btn-danger mb-1">Reject</a>
                <?php } elseif ($data['status'] == 'pending') { ?>
                  <a href="approve_menu.php?id=<?php echo $data['id']; ?>" class="btn btn-sm btn-success mb-1">Approve</a>
                  <a href="reject_menu.php?id=<?php echo $data['id']; ?>" class="btn btn-sm btn-danger mb-1">Reject</a>
                <?php } elseif ($data['status'] == 'rejected') { ?>
                  <a href="approve_menu.php?id=<?php echo $data['id']; ?>" class="btn btn-sm btn-success mb-1">Approve</a>
                <?php } ?>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>

  <?php } else { ?>
    <h4 class="text-center text-danger mt-5">Menu not found</h4>
  <?php } ?>
</div>

<br><br><br><br><br>

<?php include 'footer.php'; ?>
