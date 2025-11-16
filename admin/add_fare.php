<?php
include 'header.php';
include '../connection.php';

$train_id = $_GET['id'];

if (isset($_GET['delete_id'])) {
    $delete_id = intval($_GET['delete_id']);
    mysqli_query($con, "DELETE FROM fares WHERE id = $delete_id AND train_id = $train_id");
    header("Location: add_fare.php?id=$train_id");
    exit;
}

$stations = mysqli_query($con, "SELECT station_name FROM train_stops WHERE train_id = $train_id ORDER BY stop_order ASC");
?>

<div class="container mt-5">
  <h2 class="mb-4">Add Fare for Train ID: <?php echo $train_id; ?></h2>

  <form action="add_fare_action.php" method="POST">
    <input type="hidden" name="train_id" value="<?php echo $train_id; ?>">

    <div class="mb-3">
      <label>From Station:</label>
      <select name="from_station" class="form-control" required>
        <?php while ($row = mysqli_fetch_assoc($stations)) {
          echo "<option value='{$row['station_name']}'>{$row['station_name']}</option>";
        } ?>
      </select>
    </div>

    <?php mysqli_data_seek($stations, 0);  ?>

    <div class="mb-3">
      <label>To Station:</label>
      <select name="to_station" class="form-control" required>
        <?php while ($row = mysqli_fetch_assoc($stations)) {
          echo "<option value='{$row['station_name']}'>{$row['station_name']}</option>";
        } ?>
      </select>
    </div>

    <div class="mb-3">
      <label>Fare Amount (₹):</label>
      <input type="number" name="fare" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-success">Add Fare</button>
  </form>

  <hr class="my-4">

  <!-- View Existing Fares -->
  <h4>Existing Fares</h4>
  <table class="table table-bordered">
    <thead class="table-dark">
      <tr>
        <th>#</th>
        <th>From</th>
        <th>To</th>
        <th>Fare</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $i = 1;
      $result = mysqli_query($con, "SELECT * FROM fares WHERE train_id = $train_id");
      while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>{$i}</td>
                <td>{$row['from_station']}</td>
                <td>{$row['to_station']}</td>
                <td>₹{$row['fare']}</td>
                <td>
                  <a href='add_fare.php?id=$train_id&delete_id={$row['id']}' 
                     onclick=\"return confirm('Delete this fare?')\" 
                     class='btn btn-danger btn-sm'>Delete</a>
                </td>
              </tr>";
        $i++;
      }
      ?>
    </tbody>
  </table>
</div>

<?php include 'footer.php'; ?>
