<?php

$koneksi = new mysqli('localhost', 'root', '', 'coffeshop') or die(mysqli_error($koneksi));

// Crud Stock

if (isset($_POST['simpan'])) {
    $id = isset($_POST['id']) ? $_POST['id'] : "";
    $nama_menu = $_POST['nama_menu'];
    $harga = $_POST['harga'];
    $stock = $_POST['stock'];
    $koneksi->query("INSERT INTO menu (id, nama_menu, harga, stock) VALUES ('$id', '$nama_menu', '$harga', '$stock')");

    header("location:data.php");
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $koneksi->query("DELETE FROM menu WHERE id = '$id'");
    header("location:data.php");
}

if (isset($_POST['edit_menu'])) {
    $id = isset($_POST['id']) ? $_POST['id'] : 0; // Set a default value of 0 if id is empty
    $nama_menu = $_POST['nama_menu'];
    $harga = $_POST['harga'];
    $stock = $_POST['stock'];
    $koneksi->query("UPDATE menu SET nama_menu='$nama_menu', harga='$harga', stock='$stock' WHERE id='$id'");
    header("location:data.php");
  }
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $koneksi->query("DELETE FROM menu WHERE id = '$id'");
    header("location:data.php");
}

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