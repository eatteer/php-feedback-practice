<?php
include 'config/database.php';

class FeedbackModel
{
  static function findAllFeedback(): array
  {
    $connection = Database::getConnection();
    $query = 'select * from feedback';
    $result = mysqli_query($connection, $query);
    $feedback = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $feedback;
  }
}
