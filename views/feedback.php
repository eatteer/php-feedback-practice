<?php include 'includes/header.php' ?>

<?php
$query = 'select * from feedback';
$result = mysqli_query($connection, $query);
$feedback = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<h2>Feedback</h2>

<?php if (empty($feedback)) : ?>
  <p class="lead mt-3">There is no feedback</p>
<?php endif; ?>

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

<?php include 'includes/footer.php' ?>