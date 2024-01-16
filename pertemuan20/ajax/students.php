<?php
usleep(500000);

require "../functions.php";
$keyword = $_GET["s"];

$query = "SELECT *, students.id
  FROM ((students 
  INNER JOIN role ON students.role = role.id)
  INNER JOIN position ON students.position = position.id) 
  WHERE name LIKE '%$keyword%'";
$students = get_data($query);


?>

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