<?php
require './functions.php';

$student = query("SELECT * FROM students");

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
        <td><?= $row["role"]; ?></td>
        <td><?= $row["position"]; ?></td>
        <td><img src="./img/<?= $row["image"]; ?>" width="50px" alt=""></td>
        <td>
          <a href="">Edit</a>
          |
          <a href="">Delete</a>
        </td>
      </tr>
    <?php endforeach; ?>
  </table>

</body>

</html>