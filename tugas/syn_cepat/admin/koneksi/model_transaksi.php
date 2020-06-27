<?php

function getJenisBarang()
{
  global $konek;
  $data = [];
  $sql = "SELECT * FROM barang";
  $query = mysqli_query($konek, $sql);
  while ($x = mysqli_fetch_assoc($query)) {
    $data[] = $x;
  }
  return $data;
}

function getKota()
{
  global $konek;
  $data = [];
  $sql = "SELECT * FROM kota";
  $query = mysqli_query($konek, $sql);
  while ($x = mysqli_fetch_assoc($query)) {
    $data[] = $x;
  }
  return $data;
}

function dataTransaksiPengirim()
{
  global $konek;
  $data = [];
  $sql = "SELECT * FROM transaksi inner join pengirim on transaksi.kd_pengirim=pengirim.kd_pengirim";
  $query = mysqli_query($konek, $sql);
  while ($x = mysqli_fetch_assoc($query)) {
    $data[] = $x;
  }
  return $data;
}

function dataTransaksiPenerima()
{
  global $konek;
  $data = [];
  $sql = "SELECT * FROM transaksi inner join penerima on transaksi.kd_penerima=penerima.kd_penerima";
  $query = mysqli_query($konek, $sql);
  while ($x = mysqli_fetch_assoc($query)) {
    $data[] = $x;
  }
  return $data;
}
