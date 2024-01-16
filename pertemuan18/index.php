<?php

session_start();

if (!isset($_SESSION["login"])) {
  header("Location: ./login.php");
  exit;
}

require './functions.php';

// pagination
// konfigurasi
// jumlah halaman = total data / data perhalaman

$activePage = (isset($_GET["page"])) ? $_GET["page"] : 1;
$dataAmountPerPage = 2;

// $dataAmount = count(get_data("SELECT * FROM students"));

// halaman = 2, awal data = 2
// halaman = 3, awal data = 4

// $initialData = ($dataAmountPerPage * $activePage) - $dataAmountPerPage;

// $pageAmount = ceil($dataAmount / $dataAmountPerPage);

// $students = get_data("SELECT *, students.id
//   FROM ((students 
//   INNER JOIN role ON students.role = role.id)
//   INNER JOIN position ON students.position = position.id) 
//   ORDER BY students.id ASC
//   LIMIT $initialData, $dataAmountPerPage
//   ");

$students = pagination($activePage, $dataAmountPerPage);
$pageAmount = pageAmount("SELECT * FROM students", $dataAmountPerPage);


$search = (isset($_GET["s"])) ? $_GET["s"] : "";

// tombol cari di tekan
if (strlen($search) != 0) {
  $students = search($search, $activePage);
  $pageAmount = pageAmount("SELECT * FROM students WHERE name LIKE '%$search%'", $dataAmountPerPage);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Page</title>
</head>

<body>

  <a href="./logout.php">Logout</a>

  <h1>List's Students</h1>

  <a href="tambah.php">Add student data</a>
  <br>
  <br>

  <form action="" method="get">
    <h3>Searching for : <?= $search ?></h3>
    <label>
      Search :
      <input type="text" name="s" value="<?= $search; ?>" size="40" autofocus placeholder="Search!" autocomplete="off">
    </label>

    <button type="submit">Search!</button>

  </form>

  <br><br>

  <?php if ($activePage > 1) : ?>
    <a href="?page=<?= $activePage - 1; ?>&s=<?= $search ?>">&laquo;</a>
  <?php endif; ?>

  <!-- navigasi -->
  <?php for ($i = 1; $i <= $pageAmount; $i++) : ?>
    <?php if ($i == $activePage) : ?>
      <a style="font-weight: bold; color: red;" href="?page=<?= $i; ?>&s=<?= $search; ?>"><?= $i; ?></a>
    <?php else : ?>
      <a href="?page=<?= $i; ?>&s=<?= $search; ?>"><?= $i; ?></a>
    <?php endif; ?>
  <?php endfor; ?>

  <?php if ($activePage < $pageAmount) : ?>
    <a href="?page=<?= $activePage + 1; ?>&s=<?= $search; ?>">&raquo;</a>
  <?php endif; ?>

  <br><br>

  <table border="1" cellpadding="10" cellspacing="0">
    <tr>
      <th>No.</th>
      <th>Name</th>
      <th>School</th>
      <th>Role</th>
      <th>Position</th>
      <th>Image</th>
      <th>Action</th>
    </tr>

    <?php
    $i = 1;
    foreach ($students as $row) :
    ?>
      <tr>
        <td><?= $i++; ?></td>
        <td><?= $row["name"]; ?></td>
        <td><?= $row["school"]; ?></td>
        <td><?= $row["name_role"]; ?></td>
        <td><?= $row["name_position"]; ?></td>
        <td><img src="./img/<?= $row["image"]; ?>" width="50px" alt=""></td>
        <td>
          <a href="./ubah.php?id=<?= $row["id"]; ?>">Edit</a>
          |
          <a href="./hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('Delete data <?= $row['name']; ?>?')">Delete</a>
        </td>
      </tr>
    <?php endforeach; ?>
  </table>

</body>

</html>