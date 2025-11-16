<?php
session_start();
include 'header.php';
include '../connection.php';

$id = $_GET['id'];
$sql = "SELECT * FROM menu WHERE id = '$id'";
$result = mysqli_query($con, $sql);
$data = mysqli_fetch_assoc($result);
?>

<!-- Edit Boat Section Start -->
<div class="site-section">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <br><br>
        <h3 class="heading-92913 text-black mb-4 text-center">Update menu</h3>

        <!-- Action is now this page itself for updating -->
        <form action="" method="post" enctype="multipart/form-data" class="row">

          <div class="form-group col-md-12">
            <label for="food_name">food Name:</label>
            <input type="text" class="form-control" id="food_name" name="food_name" value="<?php echo htmlspecialchars($data['food_name']); ?>" required>
          </div>

          <div class="form-group col-md-6">
            <label for="Quantity">Quantity:</label>
            <input type="number" class="form-control" id="Quantity" name="quantity" min="1" value="<?php echo htmlspecialchars($data['quantity']); ?>" required>
          </div>

          <div class="form-group col-md-6">
            <label for="price">Price (₹):</label>
            <input type="number" class="form-control" id="price" name="price" min="0" value="<?php echo htmlspecialchars($data['price']); ?>" required>
          </div>

          <div class="form-group col-md-12">
            <label for="description">Description:</label>
            <textarea class="form-control" id="description" name="description" rows="3" required><?php echo htmlspecialchars($data['description']); ?></textarea>
          </div>

          <div class="form-group col-md-12">
            <label for="image">Image:</label>
            <input type="file" class="form-control-file" id="image" name="image" accept="image/*">
            <p>Current Image: <img src="../uploads/<?php echo $data['image']; ?>" width="80" height="80" style="object-fit:cover;"></p>
          </div>
          
          <div class="form-group col-md-12 text-center">
            <input type="submit" class="btn btn-primary py-2 px-4" name="update" value="Update menu">
          </div>

        </form>
      </div>
    </div>
  </div>
</div>
<!-- Edit Boat Section End -->

<?php
if (isset($_POST['update'])) {
    $food_name = $_POST['food_name'];
    $Quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $description = $_POST['description'];

    if (!empty($_FILES['image']['name'])) {
        $target_dir = "../uploads/";
        $image = $_FILES['image']['name'];
        $target_file = $target_dir . basename($image);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));


        if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
            $update = "UPDATE menu SET food_name='$food_name', quantity='$Quantity', price='$price', description='$description',image='$image' WHERE id='$id'";
        } else {
            echo "<script>alert('Image upload failed.'); window.history.back();</script>";
            exit;
        }
    } else {
        $update = "UPDATE menu SET food_name='$food_name', quantity='$Quantity', price='$price', description='$description' WHERE id='$id'";
    }

    if (mysqli_query($con, $update)) {
        echo "<script>alert('Product updated successfully'); window.location='view_menu.php';</script>";
    } else {
        echo "<script>alert('Error: " . mysqli_error($con) . "');</script>";
    }
}
?>

<?php include 'footer.php'; ?>
