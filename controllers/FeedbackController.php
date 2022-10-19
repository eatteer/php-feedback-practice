<?php
include 'models/FeedbackModel.php';

class FeedbackController
{
  static function findAllFeedback(): array
  {
    $feedback = FeedbackModel::findAllFeedback();
    return $feedback;
  }
}
