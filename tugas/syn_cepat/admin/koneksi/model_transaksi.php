<?php

function getJenisBarang()
{
  global $konek;
  $data = [];
  $sql = "SELECT * FROM jenis_barang";
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

function dataTransaksi()
{
  global $konek;
  $data = [];
  $sql = "SELECT *, pengirim.alamat as alamatPengirim, penerima.alamat as alamatPenerima, pengirim.kontak as kontakPengirim, penerima.kontak as kontakPenerima, kotaAsal.kota as kotaAsal, kotaTujuan.kota as kotaTujuan  FROM transaksi inner join penerima on transaksi.kd_penerima=penerima.kd_penerima inner join pengirim on transaksi.kd_pengirim=pengirim.kd_pengirim inner join barang on barang.kd_barang=transaksi.kd_barang inner join kota as kotaAsal on kotaAsal.id_kota=transaksi.asal inner join kota as kotaTujuan on kotaTujuan.id_kota=transaksi.tujuan inner join layanan on layanan.kd_layanan=transaksi.kd_layanan inner join jenis_barang on jenis_barang.id_barang=barang.jenis_barang";
  $query = mysqli_query($konek, $sql) or die(mysqli_error($konek));
  while ($x = mysqli_fetch_assoc($query)) {
    $data[] = $x;
  }
  return $data;
}

function insertTransaksi($kdTransaksi, $namaPengirim, $kontakPengirim, $alamatPengirim, $namaPenerima, $kontakPenerima, $alamatPenerima, $kdBarang, $namaBarang, $jenisBarang, $beratBarang, $kotaAsal, $kotaTujuan, $pilihLayanan, $hargaTotal)
{
  global $konek;
  $sqlPengirim = "INSERT INTO pengirim (nama_pengirim, kontak, alamat) VALUES ('$namaPengirim', '$kontakPengirim', '$alamatPengirim')";
  $insertPengirim = mysqli_query($konek, $sqlPengirim);
  $kdPengirim = mysqli_insert_id($konek);

  if ($insertPengirim) {
    $sqlPenerima = "INSERT INTO penerima (nama_penerima, kontak, alamat) VALUES ('$namaPenerima', '$kontakPenerima', '$alamatPenerima')";
    $insertPenerima = mysqli_query($konek, $sqlPenerima);
    $kdPenerima = mysqli_insert_id($konek);

    if ($insertPenerima) {
      $sqlBarang = "INSERT INTO barang (kd_barang, nama_barang, jenis_barang, berat_barang, created_at) VALUES ('$kdBarang', '$namaBarang', '$jenisBarang', '$beratBarang', CURRENT_TIMESTAMP())";
      $insertBarang = mysqli_query($konek, $sqlBarang);

      $sqlTransaksi = "INSERT INTO transaksi (kd_transaksi, kd_pengirim, kd_penerima, kd_layanan, kd_barang, harga, asal, tujuan, id_user) VALUES ('$kdTransaksi', '$kdPengirim', '$kdPenerima', '$pilihLayanan', '$kdBarang', '$hargaTotal', '$kotaAsal', '$kotaTujuan', '$_SESSION[idUser]')";
      $insertTransaksi = mysqli_query($konek, $sqlTransaksi);
      return $insertTransaksi;
    }
  }
}

function deleteTransaksi($idTransaksi)
{
  global $konek;
  $tampilTransaksi = "SELECT * FROM transaksi WHERE kd_transaksi='$idTransaksi'";
  $queryTampil = mysqli_query($konek, $tampilTransaksi);
  $tampilData = mysqli_fetch_assoc($queryTampil);

  $sqlPengirim = "DELETE FROM pengirim WHERE kd_pengirim = '$tampilData[kd_pengirim]'";
  $sqlPenerima = "DELETE FROM penerima WHERE kd_penerima = '$tampilData[kd_penerima]'";
  $sqlBarang = "DELETE FROM barang WHERE kd_barang = '$tampilData[kd_barang]'";

  $deletePenerima = mysqli_query($konek, $sqlPenerima);
  $deletePengirim = mysqli_query($konek, $sqlPengirim);
  $deleteBarang = mysqli_query($konek, $sqlBarang);
  return $deleteBarang;
}



function dataTransaksiById($id)
{
  global $konek;
  $sql = "SELECT *, pengirim.alamat as alamatPengirim, penerima.alamat as alamatPenerima, pengirim.kontak as kontakPengirim, penerima.kontak as kontakPenerima, kotaAsal.kota as kotaAsal, kotaTujuan.kota as kotaTujuan  FROM transaksi inner join penerima on transaksi.kd_penerima=penerima.kd_penerima inner join pengirim on transaksi.kd_pengirim=pengirim.kd_pengirim inner join barang on barang.kd_barang=transaksi.kd_barang inner join kota as kotaAsal on kotaAsal.id_kota=transaksi.asal inner join kota as kotaTujuan on kotaTujuan.id_kota=transaksi.tujuan inner join layanan on layanan.kd_layanan=transaksi.kd_layanan inner join jenis_barang on jenis_barang.id_barang=barang.jenis_barang WHERE kd_transaksi='$id'";
  $query = mysqli_query($konek, $sql);
  $x = mysqli_fetch_assoc($query);
  return $x;
}

function editTransaksi($kdTransaksi, $namaPengirim, $kontakPengirim, $alamatPengirim, $namaPenerima, $kontakPenerima, $alamatPenerima, $kdBarang, $namaBarang, $jenisBarang, $beratBarang, $pilihLayanan, $hargaTotal, $kotaAsal, $kotaTujuan)
{
  global $konek;
  $tampilTransaksi = "SELECT * FROM transaksi WHERE kd_transaksi = '$kdTransaksi'";
  $queryTampil = mysqli_query($konek, $tampilTransaksi);
  $tampilData = mysqli_fetch_assoc($queryTampil) or die(mysqli_error($konek));
  // var_dump($tampilData);
  // die;
  $sqlPengirim = "UPDATE pengirim SET nama_pengirim = '$namaPengirim', kontak = '$kontakPengirim', alamat = '$alamatPengirim' WHERE kd_pengirim='$tampilData[kd_pengirim]'";
  $editPengirim = mysqli_query($konek, $sqlPengirim);
  $kdPengirim = mysqli_insert_id($konek);

  if ($editPengirim) {
    $sqlPenerima = "UPDATE penerima SET nama_penerima = '$namaPenerima', kontak = '$kontakPenerima', alamat = '$alamatPenerima' WHERE kd_penerima='$tampilData[kd_penerima]'";
    $editPenerima = mysqli_query($konek, $sqlPenerima);
    $kdPenerima = mysqli_insert_id($konek);

    if ($editPenerima) {
      $sqlBarang = "UPDATE barang SET kd_barang = '$kdBarang', nama_barang = '$namaBarang', jenis_barang = '$jenisBarang', berat_barang = '$beratBarang', updated_at=CURRENT_TIMESTAMP() WHERE kd_barang='$tampilData[kd_barang]'";
      $editBarang = mysqli_query($konek, $sqlBarang) or die(mysqli_error($konek));

      $sqlTransaksi = "UPDATE transaksi SET kd_layanan = '$pilihLayanan', harga = '$hargaTotal', asal = '$kotaAsal', tujuan = '$kotaTujuan', id_user = '$_SESSION[idUser]'";
      $editTransaksi = mysqli_query($konek, $sqlTransaksi);
      return $editTransaksi;
    }
  }
}
