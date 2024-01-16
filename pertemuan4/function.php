<?php

date_default_timezone_set("Asia/Jakarta");


// echo $time;

function salam($waktu = "Datang", $nama = "Admin")
{
  $time = date("G");

  $yell = "";
  if ($time > 18 || $time < 2) {
    $yell = "Malam";
  } else if ($time > 2 || $time < 10) {
    $yell = "Pagi";
  } else {
    $yell = "Siang";
  }

  return "Selamat $yell, $nama!";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Latihan Function</title>
</head>

<body>
  <h1><?= salam(); ?></h1>
</body>

</html>