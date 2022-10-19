<?php
include 'ChromePhp.php';
include 'models/HomeModel.php';

class HomeController
{
  static function handleSubmittedForm()
  {
    // Mark errors and values as globals to use them in the view
    global $errors;
    global $values;

    
    // If form was not submitted just render the home page
    $formWasSubmitted = isset($_POST['submit']);
    if (!$formWasSubmitted) return;

    // Submitted data info consists of errors messages and values
    // to send back to the users to give them feedback about the form
    // status
    $submittedDataInfo = self::buildSubmittedDataInfo($_POST);

    // If there are errors, set them for use them in view
    // and send back the wrong values
    if ($submittedDataInfo["errors"]) {
      $errors = $submittedDataInfo["errors"];
      $values = $submittedDataInfo["values"];
      return;
    }

    /**
     * If there are not errors in the submitted data
     */

    // Destructure sanitized values
    [
      "name" => $name,
      "email" => $email,
      "body" => $body
    ] = $submittedDataInfo["values"];

    // Config feedback data
    $feedbackData = new FeedbackData();
    $feedbackData->name = $name;
    $feedbackData->email = $email;
    $feedbackData->body = $body;

    // Try to insert feedback in database
    $isSuccesfull = self::insertFeedback($feedbackData);

    // If insertion was success redirect user to feedback page
    if ($isSuccesfull) {
      $redirectionPage = 'feedback';
      header("Location: $redirectionPage");
    }
  }

  static private function insertFeedback(FeedbackData $feedbackData): bool
  {
    $wasSuccess = HomeModel::insertFeedback($feedbackData);
    return $wasSuccess;
  }

  static private function buildSubmittedDataInfo($submittedData)
  {
    [
      "name" => $name,
      "email" => $email,
      "body" => $body
    ] = $submittedData;

    $submittedDataInfo = [
      "values" => [],
      "errors" => [],
    ];

    if (empty($name)) $submittedDataInfo["errors"]["name"] = 'Name is required';

    $submittedDataInfo["values"]["name"] = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);

    if (empty($email)) $submittedDataInfo["errors"]["email"] = 'Email is required';
    $submittedDataInfo["values"]["email"] = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

    if (empty($body)) $submittedDataInfo["errors"]["body"] = 'Body is required';
    $submittedDataInfo["values"]["body"] = filter_input(INPUT_POST, 'body', FILTER_SANITIZE_SPECIAL_CHARS);

    return $submittedDataInfo;
  }
}
