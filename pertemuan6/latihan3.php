<?php
// $mahasiswa = [
//   ["Muhamad Ilhan", "A2.2100076", "Teknik Informatika", "Email1@"],
//   ["Shandika Galih", "A2.210123", "Teknik Informatika", "Email1@"]
// ];

// Array Associative
// definisnya sama seperti array numerik, kecuali
// key-nya adalah string yang kita buat sendiri

$mahasiswa = [
  [
    "nama" => "Muhamad Ilhan",
    "nim" => "A2.2100076",
    "email" => "muhamadilhan12@gmail.com",
    "jurusan" => "Teknik Informatika",
    "gambar" => "Toki_Icon.png"
  ],
  [
    "nama" => "Shandika Galih",
    "nim" => "A2.2100078",
    "email" => "shandika12@gmail.com",
    "jurusan" => "Teknik Informatika",
    "gambar" => "Haruna_Icon.png"
  ],
];

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Mahasiswa</title>
</head>

<body>
  <h1>Daftar Mahasiswa</h1>

  <?php foreach ($mahasiswa as $mhs) : ?>
    <ul>
      <li>
        <img src="img/<?= $mhs["gambar"]; ?>" alt="">
      </li>
      <li>Nama :<?= $mhs["nama"]; ?></li>
      <li>NIM :<?= $mhs["nim"]; ?></li>
      <li>Jurusan :<?= $mhs["jurusan"]; ?></li>
      <li>Email :<?= $mhs["email"]; ?></li>
    </ul>
  <?php endforeach; ?>
</body>


</html>