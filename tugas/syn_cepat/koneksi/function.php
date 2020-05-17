<?php
require 'koneksi.php';

function readLayanan()
{
  global $konek;
  $x = [];
  $sql = "SELECT * FROM layanan";
  $query = mysqli_query($konek, $sql);
  while ($data = mysqli_fetch_assoc($query)) {
    $x[] = $data;
  }
  return $x;
}

$dataLayanan = readLayanan();

function Login($email, $password)
{
  global $konek;
  $sql = "SELECT *FROM users WHERE email='$email'";
  $query = mysqli_query($konek, $sql);
  $data = mysqli_fetch_assoc($query);
  $cekData = mysqli_num_rows($query);
  if ($cekData > 0) { //CEK DATA ADA ATAU TIDAK
    if ($data['password'] == $password) { //CEK PASSWORD
      if ($data['aktif'] == 'Y') { //CEK STATUS AKUN AKTIF / TIDAK
        //BUAT SESION
        //kiri = variabel, kanan = database
        $_SESSION['idUser'] = $data["id_user"];
        $_SESSION['email'] = $data["email"];
        $_SESSION['username'] = $data['username'];
        $_SESSION['status'] = $data['aktif'];
        $_SESSION['idRole'] = $data['id_role'];

        // MENGATUR MANAGEMENT LOGIN
        if ($data['id_role'] == 1) {
          return header("Location: admin/index.php");
        } else if ($data['id_role'] == 2) {
          return header("Location: admin/index.php");
        } else if ($data['id_role'] == 4) {
          return header("Location: admin/index.php");
        } else if ($data['id_role'] == 3) {
          return header("Location: index.php");
        }
      } else {
        echo "Your Account is not activated";
      }
    } else {
      echo "Wrong Password";
    }
  } else {
    echo "Username or email is not registred";
  }
}
