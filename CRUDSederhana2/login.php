<?php
session_start();
include 'config/koneksi.php';

if (isset($_SESSION['login'])) {
    header("Location: index.php");
    exit();
}

$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $username = mysqli_real_escape_string($conn, $_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';
    
    $query = "SELECT username, password FROM user WHERE username = '$username' LIMIT 1";
    $result = mysqli_query($conn, $query);

    if ($result && $row = mysqli_fetch_assoc($result)) {
        if (password_verify($password, $row['password']) || $password === $row['password']) {
            $_SESSION['login'] = true;
            $_SESSION['username'] = $row['username'];
            
            header("Location: index.php");
            exit();
        } else {
            $error = "Password salah!";
        }
    } else {
        $error = "Username tidak ditemukan!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login Data Siswa</title>
    <link rel="stylesheet" href="style/style.css" />
  </head>
  <body>
    <main class="login-container">
      <fieldset class="login-card">
        <legend>
          <h1>Login Data Siswa</h1>
        </legend>

        <form action="" method="POST">
          <div class="form-group">
            <label for="username">Username</label>
            <input
              type="text"
              name="username"
              id="username"
              placeholder="Masukkan username"
              required
            />
          </div>

          <div class="form-group">
            <label for="password">Password</label>
            <input
              type="password"
              name="password"
              id="password"
              placeholder="Masukkan password"
              required
            />
          </div>

          <input type="submit" value="Login" class="login-button" />
        </form>
      </fieldset>
    </main>
  </body>
</html>
