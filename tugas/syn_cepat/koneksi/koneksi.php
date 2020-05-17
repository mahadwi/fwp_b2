<?php
define('SERVER', 'localhost');
define('USERNAME', 'root');
define('PASSWORD', '');
define('DB', 'db_ekspedisi2');

$konek = mysqli_connect(SERVER, USERNAME, PASSWORD, DB);

if (mysqli_connect_error()) {
  "TERJADI KESALAHAN" . mysqli_error($konek);
  die;
}