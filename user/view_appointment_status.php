<?php
session_start();
include 'header.php';
include '../connection.php';
?>


<div class="container py-5">
  <h2 class="text-center mb-4">Appointments</h2>

  <?php
  $log=$_SESSION['id'];
    $str = "SELECT * from appointment where user_id='$log'";
    $result = mysqli_query($con, $str);

  if (mysqli_num_rows($result) > 0) {
  ?>

    <div class="table-responsive">
      <table class="table table-bordered table-hover table-striped align-middle">
        <thead class="table-dark">
          <tr>
            <th scope="col">User Name</th>
            <th scope="col">Phone Number</th>
            <th scope="col">Coach Number</th>
            <th scope="col">Seat Number</th>
            <th scope="col">Status</th>
          </tr>
        </thead>
        <tbody>
          <?php while ($data = mysqli_fetch_array($result)) { ?>
            <tr>
              <td><?php echo $data['name']; ?></td>
              <td><?php echo $data['phone']; ?></td>
              <td><?php echo $data['coach_no']; ?></td>
              <td><?php echo $data['seat_no']; ?></td>
            <?php if ($data['status'] == 'approved') { ?>
                    <td><span class="badge bg-success">Approved</span></td>
              <?php } elseif ($data['status'] == 'rejected') { ?>
                <td><span class="badge bg-danger">Rejected</span></td>
                <?php } elseif ($data['status'] == 'pending') { ?>
                <td><span class="badge bg-warning">Pending</span></td>
              <?php } ?>
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
