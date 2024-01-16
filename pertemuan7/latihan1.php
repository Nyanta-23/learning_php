<?php
// $_GET
// var_dump($_GET);


$students = [
  [
    "name" => "Toki",
    "school" => "Millenium",
    "role" => "Attacker",
    "position" => "Middle",
    "img" => "Toki.png"
  ],
  [
    "name" => "Haruna",
    "school" => "Gehenna",
    "role" => "Attacker",
    "position" => "Back",
    "img" => "Haruna.png"
  ],
];


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>List Students</title>
</head>

<body>

  <h1>Student's Lists</h1>

  <ul>
    <?php foreach ($students as $student) : ?>
      <li>
        <a href="./latihan2.php?name=<?= $student["name"]; ?>&school=<?= $student["school"]; ?>&role=<?= $student["role"]; ?>&position=<?= $student["position"]; ?>&img=<?= $student["img"]; ?>">
          <?= $student["name"]; ?>
        </a>
      </li>
    <?php endforeach; ?>
  </ul>

  <!-- <li><img src="./img/<?= $student["img"]; ?>" width="200px" alt=""></li>
    <li>School: <?= $student["school"]; ?></li>
    <li>Role: <?= $student["role"]; ?></li>
    <li>Postion: <?= $student["position"]; ?></li> -->
</body>

</html>