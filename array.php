<?php
// $kota[0] = "Palembang";
// $kota[1] = "Medan";
// $kota[2] = "Semarang";
// $kota[3] = "Bandung";
// $kota[4] = "Palu";

// $kota = ['Palembang', 'Medan', 'Semarang', 'Bandung', 'Palu'];
// for ($i = 0; $i <= count($kota); $i++) {
//   echo $kota[$i];
// }

// $profil = array(
//   'nama' => "Maha Dwi Putra",
//   'tglLahir' => "08/08/1992",
//   'jk' => "Laki-laki",
//   'lajang' => true,
//   'goldarah' => "O",
//   'umur' => 28
// );

// foreach ($profil as $index => $data) {
//   echo $data . "<br>";
// }

$mahasiswa = [
  [
    'nim' => '12345',
    'nama' => 'Budi',
    'jurusan' => 'Teknik Komputer',
    'ipk' => '4',
    'pembimbing' => [
      'p1' => "Maha Dwi",
      'p2' => "Putra",
    ],
    'email' => ['budi@gmail.com', "budi@yahoo.com"]
  ],
  [
    'nim' => '12345',
    'nama' => 'Budi',
    'jurusan' => 'Teknik Komputer',
    'ipk' => '4',
    'pembimbing' => [
      'p1' => "Maha Dwi",
      'p2' => "Putra",
    ],
    'email' => ['budi@gmail.com', "budi@yahoo.com"]
  ]
];

foreach ($mahasiswa as $mhs) {
  echo $mhs['nama'] . "<br>";
  echo $mhs['jurusan'] . "<br>";
  echo $mhs['ipk'] . "<br>";
  echo $mhs['pembimbing']['p1'] . "<br>";
  echo $mhs['pembimbing']['p2'] . "<br>";
  echo $mhs['email'][0] . "<br>";
  echo $mhs['email'][1] . "<br>";
  echo "<hr>";
}
