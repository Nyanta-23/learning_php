<?php
// koneksi ke DBMS
require "./functions.php";

// mengambil data role dan position
$roles = get_data("SELECT * FROM role");
$positions = get_data("SELECT * FROM position");

$student = get_data("SELECT *, students.id
  FROM ((students 
  INNER JOIN role ON students.role = role.id)
  INNER JOIN position ON students.position = position.id) 
  ORDER BY students.id ASC
  ");

if (isset($_POST["submit"])) {

  // cek apakah data berhasil di tambahkan atau tidak
  if (add_data($_POST) > 0) {

    echo "
      <script>
        alert('Success to adding data!');
        document.location.href = './index.php';
      </script>
    ";
  } else {
    echo "
      <script>
        alert('Failed to adding data!');
        //document.location.href = './index.php';
      </script>
    ";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add student data</title>

  <style>
    ul>li {
      height: 50px;
    }
  </style>
</head>

<body>

  <a href="./index.php">Back</a>

  <h1>Add student data</h1>

  <form action="" method="post" enctype="multipart/form-data">
    <ul>
      <li>
        <label for="name">
          Name :
          <input type="text" name="name" id="name" required>
        </label>
      </li>
      <li>
        <label for="school">
          School :
          <input type="text" name="school" id="school" required>
        </label>
      </li>
      <li>
        <label for="role">
          Role :
          <select name="role" id="role" required>
            <option value="">None :</option>
            <?php foreach ($roles as $role) : ?>
              <option value="<?= $role["id"]; ?>"><?= $role["name_role"]; ?></option>
            <?php endforeach; ?>
          </select>
        </label>
      </li>
      <li>
        <label for="position">
          Position :
          <select name="position" id="position" required>
            <option value="">None :</option>
            <?php foreach ($positions as $position) : ?>
              <option value="<?= $position["id"]; ?>"><?= $position["name_position"]; ?></option>
            <?php endforeach; ?>
          </select>
        </label>
      </li>
      <li>
        <label for="image">
          Image :
          <input type="file" name="image" id="image">
        </label>
      </li>
      <li>
        <button type="submit" name="submit">Add Data!</button>
      </li>
    </ul>
  </form>

</body>

</html>