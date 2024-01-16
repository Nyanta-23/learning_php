<?php
// koneksi ke database
// host, username, password, nama_database
$db = mysqli_connect("localhost", "root", "", "students_ba");

// function feedBack() {
//   global $db;
//   return mysqli_affected_rows($db);
// };

function get_data($query)
{
  global $db;
  $result = mysqli_query($db, $query);
  $rows = [];

  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }

  return $rows;
}

function add_data($data)
{
  global $db;

  $name = htmlspecialchars($data["name"]);
  $school = htmlspecialchars($data["school"]);
  $role = htmlspecialchars($data["role"]);
  $position = htmlspecialchars($data["position"]);

  // upload gambar
  $image = upload();

  if (!$image) {
    return false;
  }

  $query = "INSERT INTO students VALUES ('', '$name', '$school', '$role', '$position','$image')";

  mysqli_query($db, $query);

  return mysqli_affected_rows($db);
}


function upload()
{

  $nameFile = $_FILES["image"]["name"];
  $sizeFile = $_FILES["image"]["size"];
  $error = $_FILES["image"]["error"];
  $tmpName = $_FILES["image"]["tmp_name"];



  // cek apakah tidak ada gambar yang di upload
  if ($error === 4) {
    echo "<script> alert('Select image first!'); </script>";
    return false;
  }

  $extImgVal = ['jpg', 'jpeg', 'png'];
  $extImg = explode('.', $nameFile);
  $extImg = strtolower(end($extImg));

  // cek apakah yang di upload adalah gambar
  if (!in_array($extImg, $extImgVal)) {
    echo "<script> alert('You didn\'t upload image!'); </script>";
    return false;
  }

  // cek jika ukurannya terlalu besar
  if ($sizeFile > 1000000) {
    echo "<script> alert('Size image is too large!'); </script>";
    return false;
  }

  // Lolos pengecekkan, gambar siap di upload
  // Generate nama gambar baru
  $newNameFile = uniqid();
  $newNameFile .= '.';
  $newNameFile .= $extImg;

  move_uploaded_file($tmpName, 'img/' . $newNameFile);

  return $newNameFile;
}



function delete_data($id, $table)
{
  global $db;
  mysqli_query($db, "DELETE FROM $table WHERE id = $id");

  return mysqli_affected_rows($db);
}


function edit_data($data)
{
  global $db;

  var_dump($data);

  $id = $data["id"];

  $name = htmlspecialchars($data["name"]);
  $school = htmlspecialchars($data["school"]);
  $role = htmlspecialchars($data["role"]);
  $position = htmlspecialchars($data["position"]);

  $oldImg = htmlspecialchars($data["oldImg"]);

  // cek apakah user pilih gambar baru atau tidak
  if ($_FILES["image"]["error"] === 4) {
    $image = $oldImg;
  } else {
    $image = upload();
  }

  // var_dump($position);

  $query = "UPDATE students SET 
              name = '$name',
              school = '$school',
              role = '$role',
              position = '$position',
              image = '$image'
            WHERE id = $id";

  var_dump($query);

  mysqli_query($db, $query);

  return mysqli_affected_rows($db);
}


function search($keyword)
{
  $query = "SELECT *, students.id
            FROM ((students 
            INNER JOIN role ON students.role = role.id)
            INNER JOIN position ON students.position = position.id) 
            WHERE name LIKE '%$keyword%'";

  return get_data($query);
}

function register($data)
{
  global $db;

  $username = strtolower(stripslashes($data["username"]));
  $password = mysqli_real_escape_string($db, $data["password"]);
  $confirmPassword = mysqli_real_escape_string($db, $data["confirmPassword"]);

  // cek username sudah ada atau belum
  $matching_username = mysqli_query($db, "SELECT username FROM users WHERE username = '$username'");

  if (mysqli_fetch_assoc($matching_username)) {
    echo "<script> alert('Username has registered!') </script>";
    return false;
  }

  // cek konfirmasi password
  if ($password !== $confirmPassword) {
    echo "<script> alert('Password is not matched!'); </script>";
    return false;
  }

  // enkripsi password
  $encrypt_password = password_hash($password, PASSWORD_DEFAULT);


  // tambahkan userbaru ke database
  mysqli_query($db, "INSERT INTO users VALUES('', '$username', '$encrypt_password')");

  return mysqli_affected_rows($db);
}
