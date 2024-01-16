<?php
// Pengulangan pada array
// for / foreach
$angkas = [3, 2, 15, 20, 1230, 12, 5821, 8];

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Latihan 2</title>

  <style>
    .kotak {
      width: 50px;
      height: 50px;
      background-color: salmon;
      text-align: center;
      line-height: 50px;
      margin: 3px;
      float: left;
    }

    .clear {
      clear: both;
    }
  </style>
</head>

<body>

  <?php for ($i = 0; $i < count($angkas); $i++) :
  ?>
    <div class="kotak"><?= $angkas[$i]; ?></div>
  <?php endfor; ?>

  <div class="clear"></div>

  <?php foreach ($angkas as $angka) :
    # code...
  ?>
    <div class="kotak"><?= $angka; ?></div>
  <?php endforeach; ?>

  <div class="clear"></div>

  <?php foreach ($angkas as $angka) {
    # code...?>
    <div class="kotak"><?= $angka; ?></div>
  <?php } ?>
</body>

</html>