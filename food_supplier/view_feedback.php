<?php
session_start();
include 'header.php'; // this already includes opening <main>
include '../connection.php';
?>

<div class="container py-5">
  <h2 class="text-center mb-4">MENU FEEDBACKS</h2>

  <?php
  $str = "SELECT menu_feedback.*, signup.name, signup.email FROM menu_feedback INNER JOIN signup ON menu_feedback.user_id = signup.login_id";
  $result = mysqli_query($con, $str);

  if (mysqli_num_rows($result) > 0) {
  ?>
    <div class="table-responsive">
      <table class="table table-bordered table-hover table-striped align-middle">
        <thead class="table-dark">
          <tr>
            <th scope="col">User Name</th>
            <th scope="col">Email</th>
            <th scope="col">Subject</th>
            <th scope="col">Feedback</th>
          </tr>
        </thead>
        <tbody>
          <?php while ($data = mysqli_fetch_array($result)) { ?>
            <tr>
              <td><?php echo $data['name']; ?></td>
              <td><?php echo $data['email']; ?></td>
              <td><?php echo $data['subject']; ?></td>
              <td><?php echo $data['feedback']; ?></td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  <?php
  } else {
    echo "<h4 class='text-center text-danger mt-5'>Feedback not found</h4>";
  }
  ?>
</div>
<br><br><br><br><br>
<?php include 'footer.php'; ?>
