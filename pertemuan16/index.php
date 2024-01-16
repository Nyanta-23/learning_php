<?php

session_start();

if (!isset($_SESSION["login"])) {
  header("Location: ./login.php");
  exit;
}

require './functions.php';

$students = get_data("SELECT *, students.id
  FROM ((students 
  INNER JOIN role ON students.role = role.id)
  INNER JOIN position ON students.position = position.id) 
  ORDER BY students.id ASC
  ");

// tombol cari di tekan
if (isset($_POST["search"])) {
  $students = search($_POST["keyword"]);
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

  <form action="" method="post">
    <label>
      Search :
      <input type="text" name="keyword" size="40" autofocus placeholder="Search!" autocomplete="off">
    </label>

    <button type="submit" name="search">Search!</button>
  </form>

  <br>

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