<?php

if (isset($_POST['btn-AddLayanan'])) {
  //ambil name dari form input
  $kdLayanan  = $_POST['kode'];
  $layanan    = $_POST['layanan'];
  $harga      = $_POST['harga'];
  $keterangan = $_POST['keterangan'];

  //query tambah database
  $insertLayanan =  insertLayanan($kdLayanan, $layanan, $harga, $keterangan);
  if ($insertLayanan) {
    notif('Berhasil tambah data layanan', 1);
    header('Location: ?page=layanan');
  } else {
    notif('Gagal Tambah Data / kode layanan sama', 1);
    header('Location: ?page=layanan');
  }
}

if (isset($_GET['aksi'])) {
  if ($_GET['aksi'] == 'delete') {
    $id = $_GET['id'];
    $deleteLayanan = deleteLayanan($id);
    if ($deleteLayanan) {
      notif('Berhasil Menghapus Data', 1);
      header('Location: ?page=layanan');
    }
  }
}

if (isset($_POST['btnEditLayanan'])) {
  $kdLayanan  = $_POST['kode'];
  $layanan    = $_POST['layanan'];
  $harga      = $_POST['harga'];
  $keterangan = $_POST['keterangan'];

  $updateLayanan = updateLayanan($kdLayanan, $layanan, $harga, $keterangan);
  if ($updateLayanan) {
    notif('Berhasil Ubah data layanan', 1);
    header("Location: ?page=layanan");
  }
}
