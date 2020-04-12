<?php
$tanggal = date("Y");
$kabisat = ($tanggal % 4 == 0) ? "Sekarang Tahun Kabisat" : "Bukan Tahun Kabisat";

echo $kabisat;
