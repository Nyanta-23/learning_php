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

  <style>
    .loader{
      width: 25px;
      position: absolute;
      margin-left: 20px;
      display: none;
    }

    @media print {
      .logout, .tambah, .form-cari, .aksi {
        display: none;
      }
    }
  </style>
</head>

<body>

  <a href="./logout.php" class="logout">Logout</a> | <a target="_blank" href="cetak.php">Print!</a>

  <h1>List's Students</h1>

  <a href="tambah.php" class="tambah">Add student data</a>
  <br>
  <br>

  <form action="" method="post" class="form-cari">
    <label>
      Search :
      <input type="text" name="keyword" size="40" autofocus placeholder="Search!" autocomplete="off" id="keyword" />
    </label>

    <button type="submit" name="search" id="search-button">Search!</button>

    <img src="./img/loading.gif" class="loader">
  </form>

  <br>

  <div id="container">

    <table border="1" cellpadding="10" cellspacing="0">
      <tr>
        <th>No.</th>
        <th>Name</th>
        <th>School</th>
        <th>Role</th>
        <th>Position</th>
        <th>Image</th>
        <th class="aksi">Action</th>
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
          <td class="aksi">
            <a href="./ubah.php?id=<?= $row["id"]; ?>">Edit</a>
            |
            <a href="./hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('Delete data <?= $row['name']; ?>?')">Delete</a>
          </td>
        </tr>
      <?php endforeach; ?>
    </table>
    
  </div>

  <script src="./js/jquery.js"></script>
  <script src="./js/script.js"></script>
</body>

</html>