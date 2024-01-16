<?php

require "./functions.php";

if (isset($_POST["register"])) {

  if(register($_POST) > 0) {
    echo "<script> alert('New user success to adding!'); </script>";
  } else {
    echo mysqli_error($db);
  }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>

  <style>
    li {
      height: 8vh;
    }
  </style>

</head>

<body>

  <h1>Regsiter Page</h1>

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
        <label for="confirmPassword">
          Confirm Password :
          <br>
          <input type="password" name="confirmPassword" id="confirmPassword">
        </label>
      </li>
      <li>
        <button type="submit" name="register">Register</button>
      </li>
    </ul>
  </form>

</body>

</html>