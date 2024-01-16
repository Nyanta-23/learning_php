<?php

session_start();

if (!isset($_SESSION["login"])) {
  header("Location: ./login.php");
  exit;
}

require "./functions.php";

$id = $_GET["id"];

if (delete_data($id) > 0) {
  echo "
  <script>
    alert('Success to deleting data!');
    // document.location.href = './index.php';
  </script>";
} else {
  echo "  
  <script>
    alert('Success to deleting data!');
    // document.location.href = './index.php';
  </script>";
}
