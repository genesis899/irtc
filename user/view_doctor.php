<?php
session_start();
include 'header.php';
include '../connection.php';
?>

<div class="container py-5">
  <h2 class="text-center mb-4">DOCTORS LIST</h2>

  <?php
  $str = "SELECT * FROM doctor_signup where availability='available'";
  $result = mysqli_query($con, $str);

  if (mysqli_num_rows($result) > 0) {
  ?>
    <div class="row g-4">
      <?php while ($data = mysqli_fetch_array($result)) { ?>
        <div class="col-md-4">
          <div class="card h-100 shadow-sm">
            <img src="../uploads/<?php echo htmlspecialchars($data['image']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($data['image']); ?>" style="height: 200px; object-fit: cover;">
            <div class="card-body d-flex flex-column">
              <h5 class="card-title text-primary fw-bold">
                <?php echo htmlspecialchars($data['name']); ?>
              </h5>

              <ul class="list-group list-group-flush mb-3">
                <li class="list-group-item">
                  <i class="bi bi-envelope-fill text-danger me-2"></i>
                  <strong>Email:</strong> <?php echo htmlspecialchars($data['email']); ?>
                </li>
                <li class="list-group-item">
                  <i class="bi bi-telephone-fill text-success me-2"></i>
                  <strong>Phone:</strong> <?php echo htmlspecialchars($data['phone']); ?>
                </li>
                <li class="list-group-item">
                  <i class="bi bi-geo-alt-fill text-warning me-2"></i>
                  <strong>Address:</strong> <?php echo htmlspecialchars($data['address']); ?>
                </li>
                <li class="list-group-item">
                  <i class="bi bi-file-earmark-text-fill text-info me-2"></i>
                  <strong>Experience Certificate:</strong>
                  <a href="../uploads/<?php echo htmlspecialchars($data['image']); ?>" target="_blank" class="badge bg-primary text-decoration-none ms-2">
                    View Certificate
                  </a>
                </li>
                <li class="list-group-item">
                  <i class="bi bi-calendar-check-fill text-success me-2"></i>
                  <strong>Availability:</strong> <?php echo htmlspecialchars($data['availability']); ?>
                </li>
              </ul>

              <a href="book_appointment.php?id=<?php echo $data['login_id']; ?>" class="btn btn-outline-danger mt-auto">
                <i class="bi bi-eye-fill me-1"></i> Book Appointment
              </a>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  <?php
  } else { 
    echo "<h4 class='text-center text-danger mt-5'>Menu not found</h4>";
  }
  ?>
</div>

<?php include 'footer.php'; ?>
