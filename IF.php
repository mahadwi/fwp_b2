<?php
$a = -160;
$b = 60;

$hasil = ($a + $b) / 2;
echo $hasil;
echo "<br>";
if ($hasil >= 80 and $hasil <= 100) {
  echo "LULUS TERBAIK";
} else if ($hasil >= 60 and $hasil <= 80) {
  echo "LULUS";
} else if ($hasil >= 50 and $hasil <= 60) {
  echo "CUKUP";
} else if ($hasil >= 0 and $hasil < 50) {
  echo "GAGAL";
} else if ($hasil < 0) {
  echo " Nilai Anda tidak terdefinisi / Salah";
} else {
  echo "Nilai anda melebihi batas";
}
