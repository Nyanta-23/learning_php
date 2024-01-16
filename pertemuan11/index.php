<?php
require './functions.php';

$student = get_data("SELECT *, students.id
  FROM ((students 
  INNER JOIN role ON students.role = role.id)
  INNER JOIN position ON students.position = position.id) 
  ORDER BY students.id ASC
  ");


// $student = get_data("SELECT * FROM students");

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Page</title>
</head>

<body>

  <h1>List's Students</h1>

  <a href="tambah.php">Add student data</a>
  <br>
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
    foreach ($student as $row) :
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