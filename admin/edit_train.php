<?php
session_start();
include 'header.php';
include '../connection.php';

$id = $_GET['id'];
$sql = "SELECT * FROM train WHERE id = '$id'";
$result = mysqli_query($con, $sql);
$data = mysqli_fetch_assoc($result);
?>

<!-- Edit Boat Section Start -->
<div class="site-section">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <br><br>
        <h3 class="heading-92913 text-black mb-4 text-center">Update train</h3>

        <!-- Action is now this page itself for updating -->
        <form action="" method="post" enctype="multipart/form-data" class="row">

          <div class="form-group col-md-12">
            <label for="train_name">TRAIN NAME:</label>
            <input type="text" class="form-control" id="train_name" name="train_name" value="<?php echo htmlspecialchars($data['name']); ?>" required>
          </div>

          <div class="form-group col-md-6">
            <label for="train_no">TRAIN NUMBER:</label>
            <input type="number" class="form-control" id="train_no" name="train_no" min="1" value="<?php echo htmlspecialchars($data['train_no']); ?>" required>
          </div>

          <div class="form-group col-md-6">
            <label for="from_d">FROM:</label>
            <input type="text" class="form-control" id="from_d" name="from_d" min="0" value="<?php echo htmlspecialchars($data['from_d']); ?>" required>
          </div>

          <div class="form-group col-md-12">
            <label for="to_d">TO:</label>
            <input type="text" class="form-control" id="to_d" name="to_d" min="0" value="<?php echo htmlspecialchars($data['to_d']); ?>" required>
          </div>

          <div class="form-group col-md-12">
            <label for="image">IMAGE:</label>
            <input type="file" class="form-control-file" id="image" name="image" accept="image/*">
            <p>Current image: <img src="../uploads/<?php echo $data['image']; ?>" width="80" height="80" style="object-fit:cover;"></p>
          </div>
          
          <div class="form-group col-md-12 text-center">
            <input type="submit" class="btn btn-primary py-2 px-4" name="update" value="Update train">
          </div>

        </form>
      </div>
    </div>
  </div>
</div>
<!-- Edit Boat Section End -->

<?php
if (isset($_POST['update'])) {
    $train_name = $_POST['train_name'];
    $train_no = $_POST['train_no'];
    $from_d = $_POST['from_d'];
    $to_d = $_POST['to_d'];

    if (!empty($_FILES['image']['name'])) {
        $target_dir = "../uploads/";
        $image = $_FILES['image']['name'];
        $target_file = $target_dir . basename($image);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));


        if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
            $update = "UPDATE train SET name='$train_name', train_no='$train_no', from_d='$from_d', to_d='$to_d',image='$image' WHERE id='$id'";
        } else {
            echo "<script>alert('Image upload failed.'); window.history.back();</script>";
            exit;
        }
    } else {
        $update = "UPDATE train SET name='$train_name', train_no='$train_no', from_d='$from_d', to_d='$to_d' WHERE id='$id'";
    }

    if (mysqli_query($con, $update)) {
        echo "<script>alert('Train updated successfully'); window.location='view_train.php';</script>";
    } else {
        echo "<script>alert('Error: " . mysqli_error($con) . "');</script>";
    }
}
?>

<?php include 'footer.php'; ?>
