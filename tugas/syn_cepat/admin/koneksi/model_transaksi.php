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
