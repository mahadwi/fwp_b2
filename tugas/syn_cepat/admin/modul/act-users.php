<?php
if (isset($_POST['btnAddUsers'])) {

  $username = $_POST['username']; //nama pada form input
  $email = $_POST['email'];
  $password = md5($_POST['password']);
  $role = $_POST['role'];
  $status = isset($_POST['status']) ? $_POST['status'] == 'on' ? 'Y' : 'N' : 'N';
  $namaDepan = $_POST['namaDepan'];
  $namaBelakang = $_POST['namaBelakang'];

  $sql = "INSERT INTO `users`(`username`, `email`, `password`, `created_at`, `aktif`, `id_role`) VALUES ('$username', '$email', '$password' , CURRENT_TIMESTAMP(), '$status', '$role')";

  $insertUsers = mysqli_query($konek, $sql);
  $idUser = mysqli_insert_id($konek); // mengambil id_user yang di insert

  if ($insertUsers) {
    $sql2 = "INSERT INTO `users_profile`(`nama_depan`, `nama_belakang`, `id_user`) VALUES ('$namaDepan', '$namaBelakang', '$idUser')";
    $insertProfil = mysqli_query($konek, $sql2);
    notif('Berhasil tambah data user', 1);
    header("Location: ?page=users");
  }
}
if (isset($_POST['btnEditUser'])) {
  $iduser       = $_POST['iduser'];
  $username     = $_POST['username'];
  $email        = $_POST['email'];
  $password     = md5($_POST['password']);
  $role         = $_POST['role'];
  $status       = isset($_POST['status']) ? $_POST['status'] == 'on' ? 'Y' : 'N' : 'N';
  $namaDepan    = $_POST['namaDepan'];
  $namaBelakang = $_POST['namaBelakang'];

  //UBAH DATA TABLE users
  if (strlen($_POST['password']) == 0) {
    $sql = "UPDATE `users` SET `username`= '$username', `email`='$email', `updated_at`=CURRENT_TIMESTAMP(), `aktif`='$status', `id_role` ='$role' WHERE id_user = '$iduser'";
  } else {
    $sql = "UPDATE `users` SET `username`= '$username', `email`='$email', `password`='$password', `updated_at`=CURRENT_TIMESTAMP(), `aktif`='$status', `id_role` ='$role' WHERE id_user = '$iduser'";
  }
  // if (($_POST['password']) == '') {


  // } else {
  //   $sql = "UPDATE `users` SET `username`= '$username', `email`='$email', `password`='$password', `updated_at`=CURRENT_TIMESTAMP(), `aktif`='$status', `id_role` ='$role' WHERE id_user = '$iduser'";
  // }
  $updateUser = mysqli_query($konek, $sql);

  if ($updateUser) {
    //UPDATE TABLE users_profile
    $sql2 = "UPDATE `users_profile` SET `nama_depan` ='$namaDepan', `nama_belakang` ='$namaBelakang' WHERE id_user = '$iduser'";
    $updateProfil = mysqli_query($konek, $sql2);

    notif('Berhasil ubah data users', 1);
    header("Location: ?page=users");
  }
}

if (isset($_GET['aksi'])) {
  if ($_GET['aksi'] == 'delete') {
    $idUser = $_GET['id'];
    $sql = "DELETE FROM users WHERE id_user = '$idUser'";
    $deleteUsers = mysqli_query($konek, $sql);
    if ($deleteUsers) {
      notif('Berhasil hapus data users', 1);
      header("Location: ?page=users");
    }
  }
}
