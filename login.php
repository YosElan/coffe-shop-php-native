<?php
session_start();
include 'koneksi.php'; // Menghubungkan ke file koneksi.php

// Cek apakah pengguna telah mengirimkan formulir login
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data yang dikirimkan melalui formulir
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query untuk memeriksa kecocokan data login dalam tabel users
    $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($koneksi, $query);

    if ($result && mysqli_num_rows($result) === 1) {
        // Ambil data pengguna
        $row = mysqli_fetch_assoc($result);
        
        // Cek peran (role) pengguna
        if ($row['role'] === 'admin') {
            // Jika peran adalah admin, arahkan ke halaman admin/data.php
            $_SESSION['logged_in'] = true;
            header("Location: admin/home.php");
            exit;
        } else {
            // Jika peran adalah user, arahkan ke halaman data.php
            $_SESSION['logged_in'] = true;
            header("Location: home.php");
            exit;
        }
    } else {
        // Jika data login tidak cocok, tampilkan pesan error
        $error_message = "Username atau password salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="assets/login.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<div class="box">
    <span class="borderline"></span>
    <form method="POST" action="">
        <h2>Sign in</h2>
        <?php if (isset($error_message)) { ?>
            <p class="error"><?php echo $error_message; ?></p>
        <?php } ?>
        <div class="inputBox">
            <input type="text" name="username" required="required">
            <span>Username</span>
            <i></i>
        </div>
        <div class="inputBox">
            <input type="password" name="password" required="required">
            <span>Password</span>
            <i></i>
        </div>
        <div class="links">
            <a href="#">Forgot password</a>
            <a href="#">Signup</a>
        </div>
        <input type="submit" value="Login">
    </form>
  </div>
</body>
</html>