<?php

$page = isset($_GET['page']) ? $_GET['page'] : '';

switch ($page) {
  case '':
    include "view/home.php";
    break;
  case 'home':
    include "view/home.php";
    break;
  case 'layanan':
    include "view/layanan.php";
    break;
  case 'yes':
    include "view/yes.php";
    break;
  case 'reg':
    include "view/reg.php";
    break;

    //LOGIN
  case 'login':
    include "view/login.php";
    break;
  case 'act-login':
    include "modul/proses-login.php";
    break;
  case 'act-logout':
    include "modul/proses-logout.php";
    break;

  default:
    include "view/404.php";
    break;
}
