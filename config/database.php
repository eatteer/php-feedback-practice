<?php
define('DB_HOST', 'localhost');
define('DB_NAME', 'feedback');
define('DB_USER', 'root');
define('DB_PASSWORD', '');

// Create database connection
$connection = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

// Check connection
$wasError = $connection->connect_error;
if ($wasError) {
  die('Connection failed: ' . $wasError);
}
