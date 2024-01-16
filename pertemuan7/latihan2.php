<?php
// var_dump($_GET);
// print_r($_GET);

// cek apakah tidak ada di $_GET

if (
  !isset($_GET["nama"]) ||
  !isset($_GET["school"]) ||
  !isset($_GET["role"]) ||
  !isset($_GET["position"]) ||
  !isset($_GET["img"])
) {
  // redirect
  header("Location: ./latihan1.php");
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detail Student</title>
</head>

<body>

  <ul>
    <li><img src="./img/<?= $_GET["img"]; ?>" alt=""></li>
    <li>Name: <?= $_GET["name"]; ?></li>
    <li>School: <?= $_GET["school"]; ?></li>
    <li>Role: <?= $_GET["role"]; ?></li>
    <li>Postion: <?= $_GET["position"]; ?></li>
  </ul>

  <a href="./latihan1.php">Back To List's Student's</a>
</body>

</html>