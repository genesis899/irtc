<?php 
include 'header.php';
include '../connection.php';
$train_id=$_GET['id'];
?>

<!-- User Signup Section -->
<section id="user-signup" class="user-signup section py-5">

  <div class="container">
    <div class="row g-0 align-items-center">

      <!-- Image Column -->
      <div class="col-lg-5 signup-img" style="background-image: url(assets/img/6.jpg); background-size: cover; background-position: center; min-height: 400px;">
      </div>

      <!-- Form Column -->
      <div class="col-lg-7 p-5 bg-white shadow-sm">

        <div class="text-center mb-4">
          <h2><b>ADD STATION</b></h2>
        </div>

        <form action="add_station_action.php" method="post" enctype="multipart/form-data">

        <input type="hidden" name="train_id" class="form-control form-control-lg rounded-3" name="train_id" value="<?php echo $train_id ?>" required>

          <div class="mb-3">
            <input type="text" name="station_name" class="form-control form-control-lg rounded-3" placeholder="Station Name" required>
          </div>
            <div class="mb-3">
            <input type="text" name="stop_order" class="form-control form-control-lg rounded-3" placeholder="Stop Order"  required>
          </div>

          <div class="text-center">
            <button type="submit" class="btn btn-danger btn-lg px-5 rounded-pill">ADD NOW</button>
          </div>
        </form>

        <!-- View Stations Table -->
        <div class="mt-5">
          <h4 class="text-center mb-3">Stations Added for This Train</h4>

          <table class="table table-bordered">
            <thead class="table-dark">
              <tr>
                <th>#</th>
                <th>Station Name</th>
                <th>Stop Order</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $i = 1;
              $result = mysqli_query($con, "SELECT * FROM train_stops WHERE train_id = $train_id ORDER BY stop_order ASC");
              while($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                        <td>".$i++."</td>
                        <td>".$row['station_name']."</td>
                        <td>".$row['stop_order']."</td>
                        <td><a href='delete_station.php?id={$row['id']}&train_id={$train_id}' onclick=\"return confirm('Are you sure you want to delete this station?')\" class='btn btn-sm btn-danger'>Delete</a></td>
                      </tr>";
              }
              ?>
            </tbody>
          </table>
        </div>

      </div>
    </div>
  </div>

</section>

<?php include 'footer.php'; ?>