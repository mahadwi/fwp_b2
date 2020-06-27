<?php
require '../../../koneksi/koneksi.php';
$idLayanan = $_GET['id'];

$sql = "SELECT harga from layanan where kd_layanan ='$idLayanan'";
$query = mysqli_query($konek, $sql);

$data = mysqli_fetch_assoc($query);

echo $data['harga'];
