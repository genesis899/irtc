<?php
session_start();
include 'header.php';
include '../connection.php';
?>

<?php
// Delete train if ID is passed
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $str = "DELETE FROM train WHERE id='$id'";
    if (mysqli_query($con, $str)) {
        echo "<script>alert('Train deleted successfully'); window.location='view_train.php';</script>";
    } else {
        echo "<script>alert('Train not deleted'); window.location='view_train.php';</script>";
    }
}
?>

<div class="container py-5">
  <h2 class="text-center mb-4">Train List</h2>

  <?php
  $str = "SELECT train.id AS train_id, train.*, login.* FROM train, login WHERE login.id = train.login_id";
  $result = mysqli_query($con, $str);

  if (mysqli_num_rows($result) > 0) {
  ?>

    <div class="table-responsive">
      <table class="table table-bordered table-hover table-striped align-middle">
        <thead class="table-dark">
          <tr>
            <th scope="col">Name</th>
            <th scope="col">Train No</th>
            <th scope="col">From</th>
            <th scope="col">To</th>
            <th scope="col">Image</th>
            <th scope="col">Stations</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php while ($data = mysqli_fetch_array($result)) { ?>
            <tr>
              <td><?php echo $data['name']; ?></td>
              <td><?php echo $data['train_no']; ?></td>
              <td><?php echo $data['from_d']; ?></td>
              <td><?php echo $data['to_d']; ?></td>
              <td>
                <img src="../uploads/<?php echo $data['image']; ?>" width="80" height="80" class="rounded" style="object-fit: cover;">
              </td>
              <td><a href="add_station.php?id=<?php echo $data['train_id']; ?>" class="btn btn-sm btn-primary">Manage Station</a>
              <a href="add_fare.php?id=<?php echo $data['train_id']; ?>" class="btn btn-sm btn-primary">Manage Fare</a></td>

              <td>
                <a href="edit_train.php?id=<?php echo $data['train_id']; ?>" class="btn btn-sm btn-primary">Edit</a>
                <a href="?id=<?php echo $data['train_id']; ?>" class="btn btn-sm btn-danger"
                   onclick="return confirm('Are you sure you want to delete this train?');">Delete</a>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>

  <?php } else { ?>
    <h4 class="text-center text-danger mt-5">Train not found</h4>
  <?php } ?>
</div>

<br><br><br><br><br>

<?php include 'footer.php'; ?>
