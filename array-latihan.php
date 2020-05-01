<?php

$perusahaan = [
  [
    'id' => '99123',
    'logo' => 'logo1',
    'perusahaan' => 'PT Wahana Ottomitra Multiartha Tbk',
    'cabang' => 'Jakarta',
    'alamat' => 'Jl Jenderal Sudirman, No. 3010',
    'provinsi' => 'Sumatera Selatan',
    'telepon' => [
      't1' => "(0711 376822)",
      't2' => "(081233445673)",
    ],
    'website' => 'link1'
  ],
  [
    'id' => '89445',
    'logo' => 'logo2',
    'perusahaan' => 'PT Akabu Sejahtera',
    'cabang' => 'Semarang',
    'alamat' => 'Jl Jenderal Sudirman, No. 3010',
    'provinsi' => 'Jawa Tengah',
    'telepon' => [
      't1' => "(0711 376822)",
      't2' => "(081233445673)",
    ],
    'website' => 'link2'
  ],
  [
    'id' => '12223',
    'logo' => 'logo3',
    'perusahaan' => 'PT Aditya Sarana Graha',
    'cabang' => 'Palembang',
    'alamat' => 'Jl Jenderal Sudirman, No. 3010',
    'provinsi' => 'Sumatera Selatan',
    'telepon' => [
      't1' => "(0711 376822)",
      't2' => "(081233445673)",
    ],
    'website' => 'link3'
  ],
  [
    'id' => '22778',
    'logo' => 'logo4',
    'perusahaan' => 'PT Arina Multikarya',
    'cabang' => 'Palembang',
    'alamat' => 'Jl Jenderal Sudirman, No. 3010',
    'provinsi' => 'Sumatera Selatan',
    'telepon' => [
      't1' => "(0711 376822)",
      't2' => "(081233445673)",
    ],
    'website' => 'link4'
  ],
  [
    'id' => '32432',
    'logo' => 'logo5',
    'perusahaan' => 'PT Unitama Sarimas',
    'cabang' => 'Jakarta',
    'alamat' => 'Jl Jenderal Sudirman, No. 3010',
    'provinsi' => 'Jakarta',
    'telepon' => [
      't1' => "(0711 376822)",
      't2' => "(081233445673)",
    ],
    'website' => 'link5'
  ]
];

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <h1>Tabel Data Perusahaan</h1>

  <table border="1">
    <tr>
      <td>ID</td>
      <td>Logo</td>
      <td>Perusahaan</td>
      <td>Cabang</td>
      <td>Alamat</td>
      <td>Provinsi</td>
      <td>Telepon</td>
      <td>Website</td>
    </tr>
    <?php foreach ($perusahaan as $usaha) { ?>
      <tr>
        <td><?php echo $usaha['id']; ?> </td>
        <td><img src="images/<?php echo $usaha['logo']; ?>"> </td>
        <td><?php echo $usaha['perusahaan']; ?> </td>
        <td><?php echo $usaha['cabang']; ?> </td>
        <td><?php echo $usaha['alamat']; ?> </td>
        <td><?php echo $usaha['provinsi']; ?> </td>
        <td>
          <?php
          foreach ($usaha['telepon'] as $tlp) {
            echo $tlp . "<br>";
          }
          ?>
        </td>
        <td><?php echo $usaha['website']; ?> </td>

      </tr>
    <?php } ?>

  </table>



  <?php
  foreach ($perusahaan as $usaha) {
  }
  ?>
</body>

</html>