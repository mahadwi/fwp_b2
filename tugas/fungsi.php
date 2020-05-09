<?php

if (isset($_POST['btnLogin'])) {
  $user = $_POST['username'];
  $pass = $_POST['password'];

  cekLogin($user, $pass, 'aktif', 'admin');
}

function cekLogin($user, $pass, $status, $level)
{
}
