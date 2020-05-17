<?php
session_start();
if (empty($_SESSION)) {
  header("Location: ../?page=login");
} else if ($_SESSION['idRole'] == 3) {
  header("Location: ../?page=login");
}

?>

<a href="../?page=act-logout">Sign Out</a>