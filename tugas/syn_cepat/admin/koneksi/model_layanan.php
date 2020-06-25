<?php

function dataLayanan()
{
  global $konek; //mengambil variabel konek dari folder koneksi
  $data     = []; //membuat variabel yang berisi array untuk menampung data
  $sql      = "SELECT * FROM layanan"; //perintah sql untuk menampilkan data dari tabel layanan
  $query    = mysqli_query($konek, $sql); //query koneksi ke database
  while ($x = mysqli_fetch_assoc($query)) { // melakukan perulangan untuk menempatkan data dari database ke dalam tabel
    $data[] = $x;
  }
  return $data;
}

function insertLayanan($kdLayanan, $layanan, $harga, $keterangan)
{
  global $konek;
  $sql           = "INSERT INTO layanan (kd_layanan, layanan, harga, keterangan) VALUES ('$kdLayanan', '$layanan', '$harga', '$keterangan')";
  $insertLayanan = mysqli_query($konek, $sql);
  return $insertLayanan;
}

function deleteLayanan($id)
{
  global $konek;
  $sql = "DELETE FROM layanan WHERE kd_layanan = '$id'";
  $deleteLayanan = mysqli_query($konek, $sql);
  return $deleteLayanan;
}
