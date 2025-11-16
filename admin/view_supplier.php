<?php
session_start();
include 'header.php';
include '../connection.php';
?>

<div class="container py-5">
  <h2 class="text-center mb-4">Supplier List</h2>

  <?php
  $str = "SELECT * FROM food_supplier_signup, login WHERE login.id = food_supplier_signup.login_id";
  $result = mysqli_query($con, $str);

  if (mysqli_num_rows($result) > 0) {
  ?>

    <div class="table-responsive">
      <table class="table table-bordered table-hover table-striped align-middle">
        <thead class="table-dark">
          <tr>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">Address</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php while ($data = mysqli_fetch_array($result)) { ?>
            <tr>
              <td><?php echo $data['name']; ?></td>
              <td><?php echo $data['email']; ?></td>
              <td><?php echo $data['phone']; ?></td>
              <td><?php echo $data['address']; ?></td>

              <?php if ($data['user_status'] == 'approved') { ?>
                <td><span class="badge bg-success">Approved</span></td>
                <td>
                  <a href="reject_supplier.php?id=<?php echo $data['login_id']; ?>" class="btn btn-sm btn-danger">Reject</a>
                </td>
              <?php } elseif ($data['user_status'] == 'pending') { ?>
                <td>
                  <a href="approve_supplier.php?id=<?php echo $data['login_id']; ?>" class="btn btn-sm btn-success">Approve</a>
                </td>
                <td>
                  <a href="reject_supplier.php?id=<?php echo $data['login_id']; ?>" class="btn btn-sm btn-danger">Reject</a>
                </td>
              <?php } elseif ($data['user_status'] == 'rejected') { ?>
                <td><span class="badge bg-danger">Rejected</span></td>
                <td>
                  <a href="approve_supplier.php?id=<?php echo $data['login_id']; ?>" class="btn btn-sm btn-success">Approve</a>
                </td>
              <?php } ?>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>

  <?php
  } else {
    echo "<h4 class='text-center text-danger mt-5'>User not found</h4>";
  }
  ?>
</div>

<br><br><br><br><br>

<?php include 'footer.php'; ?>
