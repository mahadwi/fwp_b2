<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>GET POST</title>
</head>

<body>
  <!-- POST -->
  <h3>METHOD POST</h3>
  <form action="" method="post">
    <label for="name">Nama</label>
    <input type="text" id="name" name="nama">
    <label for="alamat">Alamat</label>
    <input type="text" id="alamat" name="alamat">
    <button type="submit" name="btnSimpan">Proses</button>
  </form>

  <?php

  if (isset($_POST['btnSimpan'])) {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];

    echo "Nama Saya " . $nama . " Alamat saya " . $alamat;
  }


  ?>
  <br><br><br>
  <!-- GET -->
  <h3>METHOD GET</h3>
  <form action="" method="get">
    <label for="name">Nama</label>
    <input type="text" id="name" name="nama1">
    <label for="alamat">Alamat</label>
    <input type="text" id="alamat" name="alamat1">
    <button type="submit" name="btnSimpan1">Proses</button>
  </form>

  <?php

  if (isset($_GET['btnSimpan1'])) {
    $nama1 = $_GET['nama1'];
    $alamat1 = $_GET['alamat1'];

    echo "Nama Saya " . $nama1 . " Alamat saya " . $alamat1;
  }



  ?>
</body>

</html>