<?php
session_start();

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    // Jika pengguna belum login, arahkan ke halaman login.php
    header("Location: login.php");
    exit;
}

include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Halaman Rumah</title>
  <link rel="stylesheet" href="assets/bootstrap.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    .content-container {
      padding-top: 80px; /* Atur nilai padding atas sesuai kebutuhan */
    }
  </style>
</head>
<body>
  <!-- Navbar  -->
  <header>
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark p-md-3">
      <div class="container">
        <a class="navbar-brand" href="#">Coffe Shop</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
          aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
          <div class="mx-auto"></div>
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link text-white" href="#">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="data.php">Data</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="user.php">Management</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="logout.php">Log Out</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
  
  <!-- Main Content Area -->
  <div class="container mt-5 content-container">
    <h2 class="text-center">Selamat datang Silahkan lihat Menu-menu Kami</h2>
    <div class="d-flex justify-content-end mb-3">
    </div>
    <div class="container">
    <h2>Tabel Gambar</h2>
    <table class="table">
      <thead>
        <tr>
          <th>Gambar</th>
          <th>Nama</th>
          <th>Deskripsi</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><img src="assets/gambar1.jpg" class="img-thumbnail" alt="Gambar 1" width="100"></td>
          <td>Kopi ABC</td>
          <td>Deskripsi Gambar 1</td>
        </tr>
        <tr>
          <td><img src="assets/gambar2.jpg" class="img-thumbnail" alt="Gambar 2" width="100"></td>
          <td>Kopi Kapal Api</td>
          <td>Deskripsi Gambar 2</td>
        </tr>
        <!-- Tambahkan baris lain sesuai kebutuhan -->
      </tbody>
    </table>
  </div>


    
<!-- Menghubungkan dengan Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script>
    var nav = document.querySelector('nav');

    window.addEventListener('scroll', function () {
      if (window.pageYOffset > 100) {
        nav.classList.add('bg-dark', 'shadow');
      } else {
        nav.classList.remove('bg-dark', 'shadow');
      }
    });
  </script>
</body>
</html>
