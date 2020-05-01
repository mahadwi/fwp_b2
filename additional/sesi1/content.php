<?php

$page = isset($_GET['page']) ? $_GET['page'] : 'awal';

switch ($page) {
  case 'awal':
    include 'view/home.php';
    break;
  case 'home':
    include 'view/home.php';
    break;
  case 'about':
    include 'view/about.php';
    break;
  case 'contact':
    include 'view/contact.php';
    break;

  default:
    include 'view/404.php';
    break;
}
