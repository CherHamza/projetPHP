<?php
$page ='home.php';
if (isset($_GET["page"])) {
  switch ($_GET["page"]) {
    case 'about':
      $page = 'about.php';
      break;
    case 'members':
      $page = 'members.php';
      break;
    default:
      $page = 'home.php';
      break;
  }
}
require_once(dirname(__FILE__) . '/../views/' . $page);