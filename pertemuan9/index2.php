<?php
// koneksi ke database
// host, username, password, nama_database
$db = mysqli_connect("localhost", "root", "", "students_ba");

// ambil data siswi

$result = mysqli_query($db, "SELECT * FROM students");

// if(!$result) {
//   echo mysqli_error($db);
// }

// ambil data (fetch) students dari object $result
// mysql_fetch_row() //mengembalikan array numerik
// mysqli_fetch_assoc() // mengembalikan array associative
// mysqli_fetch_array() // mengembalikan keduanya (numerik & associative)
// mysqli_fetch_object() //


// while ($student = mysqli_fetch_assoc($result)) {
//   var_dump($student);
// }

// print_r($student);

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
    while ($row = mysqli_fetch_assoc($result)) :
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
    <?php endwhile; ?>
  </table>

</body>

</html>