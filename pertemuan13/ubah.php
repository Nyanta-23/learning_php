<?php
// koneksi ke DBMS
require "./functions.php";

// ambil data di url
$id = $_GET["id"];

// query data mahasiswa berdasarkan id
$students = get_data("SELECT *, students.id FROM ((students 
  INNER JOIN role ON students.role = role.id)
  INNER JOIN position ON students.position = position.id) 
  WHERE students.id = $id")[0];

// mengambil data role dan position
$roles = get_data("SELECT * FROM role");
$positions = get_data("SELECT * FROM position");

if (isset($_POST["submit"])) {

  // cek apakah data berhasil di ubah atau tidak

  if (edit_data($_POST) > 0) {
    echo "
      <script>
        alert('Success to editing data!');
        document.location.href = './index.php';
        </script>
        ";
  } else {
    echo " 
        <script>
        alert('Failed to editing data!');
        document.location.href = './index.php';
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
  <title>Edit student data</title>

  <style>
    ul>li {
      height: 50px;
    }
  </style>
</head>

<body>

  <a href="./index.php">Back</a>

  <h1>Edit student data</h1>

  <form action="" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $students["id"]; ?>">
    <input type="hidden" name="oldImg" value="<?= $students["image"]; ?>">
    <ul>
      <li>
        <label for="name">
          Name :
          <input type="text" name="name" id="name" value="<?= $students["name"]; ?>" required>
        </label>
      </li>
      <li>
        <label for="school">
          School :
          <input type="text" name="school" id="school" value="<?= $students["school"]; ?>" required>
        </label>
      </li>
      <li>
        <label for="role">
          Role :
          <select name="role" id="role" required>
            <option value="">None :</option>
            <?php foreach ($roles as $role) : ?>
              <option value="<?= $role["id"] ?>" <?= ($students["role"] == $role["id"]) ? "selected" : false ?>><?= $role["name_role"]; ?></option>
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
              <option value="<?= $position["id"]; ?>" <?= ($students["position"] == $position["id"]) ? "selected" : false ?>><?= $position["name_position"]; ?></option>
            <?php endforeach; ?>
          </select>
        </label>
      </li>
      <img src="img/<?= $students["image"]; ?>" style="width: 100px;" height="110px" alt="">
      <li>
        <label for="image">
          Image :
          <input type="file" name="image" id="image" />
        </label>
      </li>
      <li>
        <button type="submit" name="submit">Edit Data!</button>
      </li>
    </ul>
  </form>

</body>

</html>