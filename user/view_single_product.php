<?php
session_start();
include 'header.php';
include '../connection.php';

// Validate product ID
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo "<h4 class='text-center text-danger mt-5'>Invalid product item.</h4>";
    include 'footer.php';
    exit;
}

$id = intval($_GET['id']);
$str = "SELECT * FROM product WHERE id = '$id'";
$result = mysqli_query($con, $str);

// Check if product exists
if (mysqli_num_rows($result) == 1) {
    $data = mysqli_fetch_assoc($result);
    $available_quantity = intval($data['quantity']);
    ?>

    <div class="container py-5">
        <h2 class="mb-4 text-primary text-center">
            <?php echo htmlspecialchars($data['product_name']); ?>
        </h2>

        <div class="row">
            <div class="col-md-6 mb-4">
                <img src="../uploads/<?php echo htmlspecialchars($data['image']); ?>" 
                     alt="<?php echo htmlspecialchars($data['product_name']); ?>" 
                     class="img-fluid rounded shadow"
                     style="object-fit: cover; max-height: 400px; width: 100%;">
            </div>

            <div class="col-md-6">
                <h4>Description</h4>
                <p><?php echo nl2br(htmlspecialchars($data['description'])); ?></p>

                <ul class="list-group mb-3">
                    <li class="list-group-item">
                        <strong>Available Quantity:</strong> 
                        <?php echo htmlspecialchars($available_quantity); ?>
                    </li>
                    <li class="list-group-item">
                        <strong>Price:</strong> ₹<?php echo htmlspecialchars($data['price']); ?>
                    </li>
                </ul>

                <?php if ($available_quantity > 0) { ?>
                    <!-- ✅ Show booking form only if stock is available -->
                    <form action="book_product.php" method="POST" class="d-flex flex-column gap-3">
                        <input type="hidden" name="product_id" value="<?php echo $data['id']; ?>">

                        <div class="form-group">
                            <label for="quantity" class="form-label fw-bold">Quantity:</label>
                            <input type="number" 
                                   name="quantity" 
                                   id="quantity" 
                                   class="form-control" 
                                   value="1" 
                                   min="1" 
                                   max="<?php echo htmlspecialchars($available_quantity); ?>" 
                                   required>
                            <small class="text-muted">
                                You can book up to <?php echo htmlspecialchars($available_quantity); ?> item(s).
                            </small>
                        </div>

                        <div class="d-flex flex-wrap gap-2">
                            <button type="submit" class="btn btn-success btn-lg px-4">
                                <i class="bi bi-cart-check"></i> Book Product
                            </button>
                            <a href="view_product.php" class="btn btn-secondary btn-lg px-4">
                                <i class="bi bi-arrow-left"></i> Back to Product List
                            </a>
                        </div>
                    </form>
                <?php } else { ?>
                    <!-- ❌ Show sold out message when no stock -->
                    <div class="alert alert-danger text-center mt-4 fw-bold">
                        <i class="bi bi-exclamation-triangle"></i> Sold Out
                    </div>
                    <a href="view_product.php" class="btn btn-secondary btn-lg mt-3 px-4">
                        <i class="bi bi-arrow-left"></i> Back to Product List
                    </a>
                <?php } ?>
            </div>
        </div>
    </div>

    <?php
} else {
    echo "<h4 class='text-center text-danger mt-5'>Product not found.</h4>";
}

include 'footer.php';
?>
