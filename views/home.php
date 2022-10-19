<!-- Imports -->

<?php include "controllers/HomeController.php"; ?>
<!-- Code -->
<?php
// Declare errors and values for using in this views
$errors = [];
$values = [
  "name" => "",
  "email" => "",
  "body" => ""
];

HomeController::handleSubmittedForm();
?>

<!-- Import header component -->
<?php include "includes/header.php"; ?>

<img src="img/logo.png" class="w-25 mb-3" alt="">
<h2>Feedback</h2>
<p class="lead text-center">Leave feedback for Traversy Media</p>
<form class="mt-4 w-75" method="POST">
  <div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" class="form-control <?php echo isset($errors["name"]) ? 'is-invalid' : null; ?>" id="name" name="name" placeholder="Enter your name" value=<?php echo $values["name"] ?>>
    <div class="invalid-feedback"><?php echo $errors["name"] ?></div>
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="email" class="form-control <?php echo  isset($errors["email"]) ? 'is-invalid' : null; ?>" id="email" name="email" placeholder="Enter your email" value=<?php echo $values["email"] ?>>
    <div class="invalid-feedback"><?php echo $errors["email"] ?></div>
  </div>
  <div class="mb-3">
    <label for="body" class="form-label">Feedback</label>
    <textarea class="form-control <?php echo isset($errors["body"]) ? 'is-invalid' : null; ?>" id="body" name="body" placeholder="Enter your feedback" value=<?php echo $values["body"] ?>></textarea>
    <div class="invalid-feedback"><?php echo $errors["body"] ?></div>
  </div>
  <div class="mb-3">
    <input type="submit" name="submit" value="Send" class="btn btn-dark w-100">
  </div>
</form>

<!-- Import footer component -->
<?php include "includes/footer.php"; ?>