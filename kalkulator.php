<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kalkulator</title>
</head>

<body>

  <form action="" method="post">
    <input type="text" name="angka1" placeholder="Masukan Angka">
    <select name="operator" id="operator">
      <option value="/">/</option>
      <option value="*">*</option>
      <option value="+">+</option>
      <option value="-">-</option>
    </select>
    <input type="text" name="angka2" placeholder="Masukan Angka">
    <button type="submit" name="btnHitung">Hitung</button>
  </form>

  <?php

  if (isset($_POST['btnHitung'])) {
    $angka1 = $_POST['angka1'];
    $angka2 = $_POST['angka2'];
    $operator = $_POST['operator'];

    if ($operator == '+') {
      $hasil = $angka1 + $angka2;
    } elseif ($operator == '-') {
      $hasil = $angka1 - $angka2;
    } else if ($operator == '*') {
      $hasil = $angka1 * $angka2;
    } else if ($operator == '/') {
      $hasil =  $angka1 / $angka2;
    }
  }

  echo "Jumlah = " . $hasil;

  ?>

</body>

</html>