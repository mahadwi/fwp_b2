<?php

if (isset($_POST['btnSimpan'])) {
  $nm_brg = $_POST['nm_brg'];
  $jns_brg = $_POST['jns_brg'];
  $hrg_satu = $_POST['hrg_satu'];
  $jmlh_beli = $_POST['jmlh_beli'];
  $bayar = $_POST['bayar'];

  $total_byr = $jmlh_beli * $hrg_satu;

  if ($total_byr >= 100000 and $total_byr < 150000) {
    $diskon = $total_byr * 0.3;
  } else if ($total_byr >= 150000 and $total_byr < 200000) {
    $diskon = $total_byr * 0.4;
  } else if ($total_byr >= 200000 and $total_byr < 500000) {
    $diskon = $total_byr * 0.5;
  } else if ($total_byr >= 500000) {
    $diskon = 300000;
  } else {
    $diskon = 0;
  }
  $total_stlh = $total_byr - $diskon;
  $kembalian = $bayar - $total_stlh;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <style>
    .form {
      border: 1px solid #000;
      width: 500px;
      height: 500px;
      margin: 5px;
      margin: auto;
    }

    .input {
      margin: 5px;
      display: block;
    }
  </style>
</head>

<body>

  <div class="form">
    <form action="" method="POST">
      <input type="text" placeholder="Nama Barang" name="nm_brg" class="input" class="input" value="<?= isset($nm_brg) ? $nm_brg : '' ?>">
      <input type="text" placeholder="Jenis Barang" name="jns_brg" class="input" value="<?= isset($jns_brg) ? $jns_brg : '' ?>">
      <input type="text" placeholder="Harga Satuan" name="hrg_satu" class="input" value="<?= isset($hrg_satu) ? $hrg_satu : '' ?>">
      <input type="text" placeholder="Jumlah Beli" name="jmlh_beli" class="input" value="<?= isset($jmlh_beli) ? $jmlh_beli : '' ?>">
      <label for="">Total Bayar</label>
      <input type="text" placeholder="Total Bayar" name="total" class="input" disabled value="<?= isset($total_byr) ? $total_byr : '' ?>">
      <label for="">Diskon</label>
      <input type="text" placeholder="Discount" name="disc" class="input" disabled value="<?= isset($diskon) ? $diskon : '' ?>">
      <label for="">Total Setelah Diskon</label>
      <input type="text" placeholder="Total Setelah Discount" name="total_stlh" class="input" disabled value="<?= isset($total_stlh) ? $total_stlh : '' ?>">
      <label for="">Bayar</label>
      <input type="text" placeholder="Bayar" name="bayar" class="input" value="<?= isset($bayar) ? $bayar : '' ?>">
      <label for="">Kembalian</label>
      <input type=" text" placeholder="Kembalian" name="kembalian" class="input" disabled value="<?= isset($kembalian) ? $kembalian : '' ?>">
      <button type="submit" name="btnSimpan" class="input">Update</button>
    </form>
  </div>



</body>

</html>