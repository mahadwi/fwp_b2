<?php
session_start();
ob_start();
require 'koneksi/function-admin.php';
if (empty($_SESSION)) {
  header("Location: ../?page=login");
} else if ($_SESSION['idRole'] == 3) {
  header("Location: ../?page=login");
}

?>
<!doctype html>
<html lang="en">

<head>
  <?php include 'kepala.php' ?>
</head>

<body>
  <?php include 'header.php' ?>

  <div class="container-fluid">
    <div class="row">
      <?php include 'menu.php' ?>

      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
        <?php include 'content.php' ?>
      </main>
    </div>
  </div>
  <?php include 'kaki.php' ?>
</body>

</html>