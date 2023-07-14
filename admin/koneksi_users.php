<?php

$koneksi = new mysqli('localhost', 'root', '', 'coffeshop') or die(mysqli_error($koneksi));

// Crud Users
if (isset($_POST['simpan_users'])) {
    $id = isset($_POST['id']) ? $_POST['id'] : "";
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    $koneksi->query("INSERT INTO users (id, username, password, role) VALUES ('$id', '$username', '$password', '$role')");

    header("location:user.php");
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $koneksi->query("DELETE FROM users WHERE id = '$id'");
    header("location:user.php");
}

if (isset($_POST['edit_users'])) {
    $id = isset($_POST['id']) ? $_POST['id'] : 0; // Set a default value of 0 if id is empty
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    $koneksi->query("UPDATE users SET username='$username', password='$password', role='$role' WHERE id='$id'");
    header("location:user.php");
  }
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $koneksi->query("DELETE FROM users WHERE id = '$id'");
    header("location:user.php");
}
?>