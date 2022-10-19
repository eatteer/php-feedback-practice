<?php
$path = $_GET['path'];
$urns = explode("/", $path);
$page = $urns[0];

switch ($page) {
  case "home":
    include "views/home.php";
    break;
  case "feedback":
    include "views/feedback.php";
    break;
  case "about":
    include "views/about.php";
    break;
}
