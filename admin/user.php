<?php
session_start();

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    // Jika pengguna belum login, arahkan ke halaman login.php
    header("Location: ../login.php");
    exit;
}

include 'koneksi_users.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Management User</title>
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
        <a class="navbar-brand" href="#">Coffee Shop</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
          aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
          <div class="mx-auto"></div>
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link text-white" href="home.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="data.php">Data</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="#">Management</a>
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
    <h2 class="text-center">Selamat datang, berikut data para User Web</h2>
    <div class="d-flex justify-content-end mb-3">
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahDataModal">
        Tambah Data
      </button>
    </div>

    <table class="table  mt-4">
      <thead class="table-dark">
        <tr>
          <th scope="col">No</th>
          <th scope="col">ID</th>
          <th scope="col">Username</th>
          <th scope="col">Password</th>
          <th scope="col">Role</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no = 1;
        $hasil = $koneksi->query("SELECT * FROM users");
        while ($row = $hasil->fetch_assoc()) {
        ?>
        <tr>
          <td><?= $no++; ?></td>
          <td><?= $row['id']; ?></td>
          <td><?= $row['username']; ?></td>
          <td>********</td>
          <td><?= $row['role']; ?></td>
          <td>
            <!-- Tombol Edit Data -->
            <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
              data-bs-target="#editModal<?= $row['id']; ?>">
              Edit
            </button>

            <!-- Modal Edit -->
            <div class="modal fade" id="editModal<?= $row['id']; ?>" tabindex="-1" aria-labelledby="editModal<?= $row['id']; ?>" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel<?= $row['id']; ?>">Edit Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <!-- Form edit data -->
                    <form method="POST">
                      <input type="hidden" name="id" value="<?= $row['id']; ?>">
                      <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" name="username" class="form-control" id="username" value="<?= $row['username']; ?>" required>
                      </div>
                      <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="password" placeholder="********" required>
                      </div>
                      <div class="mb-3">
                        <label for="role" class="form-label">Role</label>
                        <select name="role" class="form-control" id="role" required>
                          <option value="admin" <?php if ($row['role'] === 'admin') echo 'selected'; ?>>Admin</option>
                          <option value="user" <?php if ($row['role'] === 'user') echo 'selected'; ?>>User</option>
                        </select>
                      </div>
                      <button type="submit" name="edit_users" class="btn btn-primary" value="edit">Edit</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>

            <!-- Tombol Hapus Data -->
            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
              data-bs-target="#hapusModal<?= $row['id']; ?>">
              Hapus
            </button>

            <!-- Modal Hapus -->
            <div class="modal fade" id="hapusModal<?= $row['id']; ?>" tabindex="-1"
              aria-labelledby="hapusModalLabel<?= $row['id']; ?>" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="hapusModalLabel<?= $row['id']; ?>">Konfirmasi Hapus</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <p>Anda yakin ingin menghapus data ini?</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <a href="koneksi_users.php?id=<?= $row['id']; ?>" class="btn btn-danger">Hapus</a>
                  </div>
                </div>
              </div>
            </div>
          </td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>

  <!-- Modal Tambah Data -->
  <div class="modal fade" id="tambahDataModal" tabindex="-1" aria-labelledby="tambahDataModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="tambahDataModalLabel">Tambah Data</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <!-- Form tambah data -->
          <form method="POST" action="koneksi_users.php">
            <div class="mb-3">
              <label for="id" class="form-label">ID</label>
              <input type="number" name="id" class="form-control" id="id" required>
            </div>
            <div class="mb-3">
              <label for="username" class="form-label">Username</label>
              <input type="text" name="username" class="form-control" id="username" required>
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" name="password" class="form-control" id="password" required>
            </div>
            <div class="mb-3">
              <label for="role" class="form-label">Role</label>
              <select name="role" class="form-control" id="role" required>
                <option value="admin">Admin</option>
                <option value="user">User</option>
              </select>
            </div>
            <button type="submit" name="simpan_users" class="btn btn-primary">Simpan</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
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
