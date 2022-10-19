<?php
include 'config/database.php';

class FeedbackData
{
  public string $name;
  public string $email;
  public string $body;
}

class HomeModel
{
  static function insertFeedback(FeedbackData $feedbackData): bool
  {
    $connection = Database::getConnection();
    $query = "insert into feedback (name, email, body)
    values ('$feedbackData->name', '$feedbackData->email', '$feedbackData->body')";
    $isSuccesfull = mysqli_query($connection, $query);
    return $isSuccesfull;
  }
}
