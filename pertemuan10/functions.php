<?php
// koneksi ke database
// host, username, password, nama_database
$db = mysqli_connect("localhost", "root", "", "students_ba");

function feedBack() {
  global $db;
  return mysqli_affected_rows($db);
};

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
  $image = htmlspecialchars($data["image"]);

  $query = "INSERT INTO students VALUES ('', '$name', '$school', '$role', '$position','$image')";

  mysqli_query($db, $query);

  return mysqli_affected_rows($db);
}

function delete_data($id, $table) {
  global $db;
  mysqli_query($db, "DELETE FROM $table WHERE id = $id");
  
  return mysqli_affected_rows($db);
}
