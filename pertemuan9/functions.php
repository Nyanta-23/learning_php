<?php
// koneksi ke database
// host, username, password, nama_database
$db = mysqli_connect("localhost", "root", "", "students_ba");

function query($query)
{
  global $db;
  $result = mysqli_query($db, $query);
  $rows = [];

  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }

  return $rows;
}
