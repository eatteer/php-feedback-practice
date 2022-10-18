<?php include 'includes/header.php' ?>

<?php
$name = $email = $body = ''; // For sanitized inputs
$nameError = $emailError = $bodyError = '';
$formWasSubmitted = isset($_POST['submit']);
if ($formWasSubmitted) {
  // Destructure submitted data
  [
    'name' => $submittedName,
    'email' => $submittedEmail,
    'body' => $submittedBody
  ] = $_POST;

  // Validate submitted data
  if (empty($submittedName)) {
    $nameError = 'Name is required';
  } else {
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
  }

  if (empty($submittedEmail)) {
    $emailError = 'Email is required';
  } else {
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
  }

  if (empty($submittedBody)) {
    $bodyError = 'Body is required';
  } else {
    $body = filter_input(INPUT_POST, 'body', FILTER_SANITIZE_SPECIAL_CHARS);
  }

  $isDataError = !empty($nameError) || !empty($emailError) || !empty($bodyError);

  // If there are not errors in the data
  if (!$isDataError) {
    $query = "insert into feedback (name, email, body) values ('$name', '$email', '$body')";
    $isSuccesfull = mysqli_query($connection, $query);
    if ($isSuccesfull) {
      $redirectionPage = './feedback.php';
      header("Location: $redirectionPage");
    }
  }
}
?>

<img src="img/logo.png" class="w-25 mb-3" alt="">
<h2>Feedback</h2>
<p class="lead text-center">Leave feedback for Traversy Media</p>
<form class="mt-4 w-75" method="POST">
  <div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" class="form-control <?php echo $nameError ? 'is-invalid' : null; ?>" id="name" name="name" placeholder="Enter your name">
    <div class="invalid-feedback"><?php echo $nameError ?></div>
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="email" class="form-control <?php echo $emailError ? 'is-invalid' : null; ?>" id="email" name="email" placeholder="Enter your email">
    <div class="invalid-feedback"><?php echo $emailError ?></div>
  </div>
  <div class="mb-3">
    <label for="body" class="form-label">Feedback</label>
    <textarea class="form-control <?php echo $bodyError ? 'is-invalid' : null; ?>" id="body" name="body" placeholder="Enter your feedback"></textarea>
    <div class="invalid-feedback"><?php echo $bodyError ?></div>
  </div>
  <div class="mb-3">
    <input type="submit" name="submit" value="Send" class="btn btn-dark w-100">
  </div>
</form>
<?php include 'includes/footer.php' ?>