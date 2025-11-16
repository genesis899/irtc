<?php include 'header.php'; 
$menu_id = $_GET['id']; // this should be book_menu.id
?>

<section id="user-signup" class="user-signup section py-5">
  <div class="container">
    <div class="row g-0 align-items-center">
      <div class="col-lg-7 p-5 bg-white shadow-sm">
        <div class="text-center mb-4">
          <h2><b>MENU FEEDBACK</b></h2>
        </div>

        <form action="menu_feedback_action.php" method="post">
          <input type="hidden" name="menu_id" value="<?php echo $menu_id; ?>">

          <div class="mb-3">
            <input type="text" name="subject" class="form-control form-control-lg rounded-3" placeholder="Subject" required>
          </div>

          <div class="mb-3">
            <textarea name="feedback" class="form-control form-control-lg rounded-3" rows="4" placeholder="Feedback" required></textarea>
          </div>

          <div class="text-center">
            <button type="submit" class="btn btn-danger btn-lg px-5 rounded-pill">SUBMIT</button>
          </div>
        </form>

      </div>
    </div>
  </div>
</section>

<?php include 'footer.php'; ?>
