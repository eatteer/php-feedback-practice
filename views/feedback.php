<!-- Imports -->
<?php include 'controllers/FeedbackController.php'; ?>

<!-- Code -->
<?php $feedback = FeedbackController::findAllFeedback(); ?>

<!-- Import header component -->
<?php include 'includes/header.php'; ?>

<h2>Feedback</h2>

<!-- There is no feedback -->
<?php if (empty($feedback)) : ?>
  <p class="lead mt-3">There is no feedback</p>
<?php endif; ?>

<!-- There is feedback -->
<?php foreach ($feedback as $item) : ?>
  <div class="card my-3 w-75">
    <div class="card-body text-center">
      <p><?php echo $item['body']; ?></p>
      <p class="text-secondary mt-2">
        By <?php echo $item['name']; ?>
        on <?php echo $item['createdAt'] ?>
      </p>
    </div>
  </div>
<?php endforeach; ?>

<!-- Import footer component -->
<?php include 'includes/footer.php' ?>