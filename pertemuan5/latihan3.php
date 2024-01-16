<!-- Array Numerik -->
<?php
$mahasiswas = [
  ["Muhamad Ilhan", "A2.2100076", "Teknik Informatika", "Email1@"],
  ["Shandika Galih", "A2.210123", "Teknik Informatika", "Email1@"]
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

  <?php foreach ($mahasiswas as $mahasiswa) : ?>
    <ul>
      <li>Nama: <?= $mahasiswa[0]; ?></li>
      <li>NIM: <?= $mahasiswa[1]; ?></li>
      <li>Jurusan: <?= $mahasiswa[2]; ?></li>
      <li>Email: <?= $mahasiswa[3]; ?></li>
    </ul>
  <?php endforeach; ?>
</body>

</html>