<?php

$page = isset($_GET['page']) ? $_GET['page'] : '';

switch ($page) {
  case '':
    include "view/dashboard.php";
    break;
  case 'home':
    include "view/dashboard.php";
    break;
  case 'dashboard':
    include "view/dashboard.php";
    break;
  case 'profil':
    include 'view/profil.php';
    break;
  case 'users':
    include "view/users.php";
    break;
  case 'act-users':
    include "modul/act-users.php";
    break;
  case 'act-profil':
    include "modul/act-profile.php";
    break;

  case 'act-logout':
    include "modul/proses-logout.php";
    break;

  default:
    include "view/404.php";
    break;
}
