<?php

if (isset($_POST['btnAddTransaksi'])) {
  $kdTransaksi    = $_POST['kdTransaksi'];
  $namaPengirim   = $_POST['namaPengirim'];
  $kontakPengirim = $_POST['kontakPengirim'];
  $alamatPengirim = $_POST['alamatPengirim'];
  $namaPenerima   = $_POST['namaPenerima'];
  $kontakPenerima = $_POST['kontakPenerima'];
  $alamatPenerima = $_POST['alamatPenerima'];
  $kdBarang       = $_POST['kodeBarang'];
  $namaBarang     = $_POST['namaBarang'];
  $jenisBarang    = $_POST['jenisBarang'];
  $beratBarang    = $_POST['beratBarang'];
  $kotaAsal       = $_POST['kotaAsal'];
  $kotaTujuan     = $_POST['kotaTujuan'];
  $pilihLayanan   = $_POST['pilihLayanan'];
  $hargaTotal     = $_POST['hargaTotal'];

  $insertTransaksi = insertTransaksi($kdTransaksi, $namaPengirim, $kontakPengirim, $alamatPengirim, $namaPenerima, $kontakPenerima, $alamatPenerima, $kdBarang, $namaBarang, $jenisBarang, $beratBarang, $kotaAsal, $kotaTujuan, $pilihLayanan, $hargaTotal);
  if ($insertTransaksi) {
    notif('Berhasil Tambah Data', 1);
    header('Location: ?page=transaksi');
  }
}

if (isset($_GET['aksi'])) {
  if ($_GET['aksi'] == 'delete') {
    $idTransaksi = $_GET['id'];
    $deleteTransaksi = deleteTransaksi($idTransaksi);

    if ($deleteTransaksi) {
      notif('Berhasil Delete Data', 1);
      header('Location: ?page=transaksi');
    }
  }
}

if (isset($_POST['btnEditTransaksi'])) {
  $kdTransaksi    = $_POST['kdTransaksi'];
  $namaPengirim   = $_POST['namaPengirim'];
  $kontakPengirim = $_POST['kontakPengirim'];
  $alamatPengirim = $_POST['alamatPengirim'];
  $namaPenerima   = $_POST['namaPenerima'];
  $kontakPenerima = $_POST['kontakPenerima'];
  $alamatPenerima = $_POST['alamatPenerima'];
  $kdBarang       = $_POST['kodeBarang'];
  $namaBarang     = $_POST['namaBarang'];
  $jenisBarang    = $_POST['jenisBarang'];
  $beratBarang    = $_POST['beratBarang'];
  $kotaAsal       = $_POST['kotaAsal'];
  $kotaTujuan     = $_POST['kotaTujuan'];
  $pilihLayanan   = $_POST['pilihLayanan'];
  $hargaTotal     = $_POST['hargaTotal'];

  $editTransaksi = editTransaksi($kdTransaksi, $namaPengirim, $kontakPengirim, $alamatPengirim, $namaPenerima, $kontakPenerima, $alamatPenerima, $kdBarang, $namaBarang, $jenisBarang, $beratBarang, $pilihLayanan, $hargaTotal, $kotaAsal, $kotaTujuan);
  // var_dump($editTransaksi);
  // die;

  if ($editTransaksi) {
    notif('Berhasil Edit Transaksi', 1);
    header('Location: ?page=transaksi');
  }
}
