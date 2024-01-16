<?php
// cek apakah tombol submit sudah di tekan?
if (isset($_POST["submit"])) {
  // cek username & password
  if ($_POST["username"] == "admin" && $_POST["password"] == "123") {
    // jika benar, redirect ke halaman admin
    header("Location: ./admin.php");
    exit;
  } else {
    // jika salah, tampilkan pesan kesalahan
    $error = true;
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
</head>

<body>
  <h1>Login Admin</h1>

  <?php if (isset($error)) : ?>
    <p style="color: red; font-style: italic;">Username / Password salah!</p>
  <?php endif; ?>

  <ul>
    <form action="" method="post">
      <li>
        <label for="username">
          Username :
          <input id="username" type="text" name="username">
        </label>
      </li>
      <li>
        <label for="password">
          Password :
          <input id="password" type="password" name="password">
        </label>
      </li>
      <li>
        <button type="submit" name="submit">Login</button>
      </li>
    </form>

  </ul>

</body>

</html>