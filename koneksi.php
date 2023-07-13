<?php

$koneksi = new mysqli('localhost', 'root', '', 'coffeshop') or die(mysqli_error($koneksi));

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

?>