<?php
session_start();
include 'header.php';
include '../connection.php';
?>

<div class="container py-5">
  <h2 class="text-center mb-4">Search & View Trains</h2>

  <!-- Search Form -->
  <form method="GET" action="">
    <div class="row mb-4">
      <div class="col-md-5">
        <label>From Station:</label>
        <select name="from_station" class="form-control" required>
          <option value="">-- Select From Station --</option>
          <?php
          $stations = mysqli_query($con, "SELECT DISTINCT from_station FROM fares");
          while ($s = mysqli_fetch_assoc($stations)) {
              $selected = (isset($_GET['from_station']) && $_GET['from_station'] == $s['from_station']) ? 'selected' : '';
              echo "<option value='{$s['from_station']}' $selected>{$s['from_station']}</option>";
          }
          ?>
        </select>
      </div>

      <div class="col-md-5">
        <label>To Station:</label>
        <select name="to_station" class="form-control" required>
          <option value="">-- Select To Station --</option>
          <?php
          $stations2 = mysqli_query($con, "SELECT DISTINCT to_station FROM fares");
          while ($s2 = mysqli_fetch_assoc($stations2)) {
              $selected = (isset($_GET['to_station']) && $_GET['to_station'] == $s2['to_station']) ? 'selected' : '';
              echo "<option value='{$s2['to_station']}' $selected>{$s2['to_station']}</option>";
          }
          ?>
        </select>
      </div>

      <div class="col-md-2 d-flex align-items-end">
        <button type="submit" class="btn btn-success w-100">Search</button>
      </div>
    </div>
  </form>

  <?php
  if (isset($_GET['from_station']) && isset($_GET['to_station'])) {
      $from = mysqli_real_escape_string($con, $_GET['from_station']);
      $to   = mysqli_real_escape_string($con, $_GET['to_station']);

      $query = "SELECT fares.*, train.train_no, train.from_d, train.to_d, train.image, train.name 
                FROM fares 
                JOIN train ON fares.train_id = train.id
                WHERE fares.from_station = '$from' AND fares.to_station = '$to'";

      $result = mysqli_query($con, $query);

      if (mysqli_num_rows($result) > 0) {
          echo '<div class="table-responsive">';
          echo '<table class="table table-bordered table-hover table-striped align-middle">';
          echo '<thead class="table-dark"><tr>
                  <th>Name</th>
                  <th>Train No</th>
                  <th>From</th>
                  <th>To</th>
                  <th>Fare (₹)</th>
                  <th>Image</th>
                  <th>Action</th>
                </tr></thead><tbody>';
          while ($row = mysqli_fetch_assoc($result)) {
              echo "<tr>
                      <td>{$row['name']}</td>
                      <td>{$row['train_no']}</td>
                      <td>{$row['from_station']}</td>
                      <td>{$row['to_station']}</td>
                      <td>₹{$row['fare']}</td>
                      <td><img src='../uploads/{$row['image']}' width='80' height='80' class='rounded' style='object-fit:cover;'></td>
                      <td>
                        <a href='book_train.php?fare_id={$row['id']}' class='btn btn-primary btn-sm'>Book</a>
                      </td>
                    </tr>";
          }
          echo '</tbody></table></div>';
      } else {
          echo "<h5 class='text-center text-danger'>No trains found for $from → $to</h5>";
      }
  }
  ?>
</div>

<?php include 'footer.php'; ?>
