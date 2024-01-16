<?php

session_start();
require "./functions.php";

// cek cookie
if (isset($_COOKIE['number']) && isset($_COOKIE['key'])) {
  $id = $_COOKIE["number"];
  $key = $_COOKIE["key"];

  // ambil username berdasarkan id
  $result = mysqli_query($db, "SELECT username FROM users WHERE id = $id");
  $row = mysqli_fetch_assoc($result);

  // cek cookie dan username
  if ($key === hash('sha256', $row["username"])) {
    $_SESSION['login'] = true;
  }
}

if (isset($_SESSION["login"])) {
  header("Location: ./index.php");
  exit;
}


if (isset($_POST["login"])) {

  $username = $_POST["username"];
  $password = $_POST["password"];

  $results = mysqli_query($db, "SELECT * FROM users WHERE username = '$username'");

  // cek username
  if (mysqli_num_rows($results) === 1) {

    // cek password
    $row = mysqli_fetch_assoc($results);

    if (password_verify($password, $row["password"])) {

      // set session
      $_SESSION["login"] = true;

      // cek remember me
      if (isset($_POST["remember"])) {
        // buat cookie
        setcookie('number', $row["id"], time() + 60);
        setcookie('key', hash('sha256', $row["username"]), time() + 60);
      }

      header("Location: ./index.php");
      exit;
    }
  }

  $error = true;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <style>
    li {
      height: 10vh;
    }
  </style>
</head>

<body>

  <h1>Login Page</h1>

  <?php if (isset($error)) : ?>
    <p style="color: red; font-style: italic;">wrong username or password</p>
  <?php endif; ?>

  <form action="" method="post">

    <ul>
      <li>
        <label for="username">
          Username :
          <br>
          <input type="text" name="username" id="username">
        </label>
      </li>
      <li>
        <label for="password">
          Password :
          <br>
          <input type="password" name="password" id="password">
        </label>
      </li>
      <li>
        <label>
          <input type="checkbox" name="remember">
          Remeber Me
        </label>
      </li>
      <li>
        <button type="submit" name="login">Login</button>
      </li>
    </ul>

  </form>

</body>

</html>