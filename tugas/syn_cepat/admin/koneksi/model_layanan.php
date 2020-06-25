<?php
function dataLayanan()
{
  global $konek;
  $data = [];
  $sql = "SELECT * FROM layanan";
  $query = mysqli_query($konek, $sql);
  while ($x = mysqli_fetch_assoc($query)) {
    $data[] = $x;
  }
  return $data;
}


function insertLayanan($kode, $layanan, $harga, $keterangan)
{
  global $konek;
  $sql = "INSERT INTO layanan (kd_layanan, layanan, harga, keterangan) VALUES ('$kode', '$layanan', '$harga', '$keterangan')";
  $insertLayanan = mysqli_query($konek, $sql);
  return $insertLayanan;
}

function updateLayanan($kode, $layanan, $harga, $keterangan)
{
  global $konek;
  $sql = "UPDATE layanan SET layanan = '$layanan', harga = '$harga', keterangan = '$keterangan' WHERE kd_layanan = '$kode'";
  $updateLayanan = mysqli_query($konek, $sql);
  return $updateLayanan;
}

function deleteLayanan($id)
{
  global $konek;
  $sql = "DELETE FROM layanan WHERE kd_layanan = '$id'";
  $deleteLayanan = mysqli_query($konek, $sql);

  return $deleteLayanan;
}

function dataLayananById($id)
{
  global $konek;
  $sql = "SELECT * FROM layanan WHERE kd_layanan = '$id'";
  $query = mysqli_query($konek, $sql);
  $data = mysqli_fetch_assoc($query);
  return $data;
}
