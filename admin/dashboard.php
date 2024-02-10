<?php
session_start();


if (!isset($_SESSION["username"])) {
  header("Location:../index.php");
  exit;
}
if ($_SESSION['role'] === 'koordinator') {
  header("Location:./../koordinator/koordinator.php");
} else if ($_SESSION['role'] === 'teknisi') {
  header("Location:./../teknisi/dashboard.php");
} else if ($_SESSION['role'] === 'pelapor') {
  header("Location:./../pelapor/homepage.php");
} else {
  $id_user = $_SESSION["id_user"];
  $username = $_SESSION["username"];
  $name = $_SESSION["name"];
  $email = $_SESSION["email"];
  ?>

      <!DOCTYPE html>
      <html lang="en">

      <head>
        <meta charset="UTF-8" />
        <title>Dashboard</title>
        <link rel="stylesheet" href="../assets/style/admin_style.css" />
        <link rel="icon" href="img/favicon.ico" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
      </head>

      <body>
        <span style="font-family: verdana, geneva, sans-serif;">
          <div class="container">
            <nav>
              <ul>
                <li><a href="dashboard.php" class="logo">
                    <img src="../assets/img/logo.webp" alt="">
                    <span class="nav-item">DashBoard</span>
                  </a></li>
                <li><a href="dashboard.php">
                    <i class="fas fa-home"></i>
                    <span class="nav-item">Home</span>
                <li><a href="data.php">
                    <i class="fas fa-chart-bar"></i>
                    <span class="nav-item">Data Laporan</span>
                  </a></li>
                <li><a href="data_alat.php">
                  <i class="fas fa-dumbbell"></i>
                  <span class="nav-item">Data Alat</span>
                </a></li>
                <li><a href="../logout.php">
                    <i class="fas fa-sign-out-alt"></i>
                    <span class="nav-item">Log out</span>
                  </a></li>
              </ul>
            </nav>

            <section class="main">
              <!-- Menu Header-->
              <div class="main-top">
                <h1>Laporan</h1>
                <i class="fas fa-user-cog"></i>
              </div>

              <div class="main-skills">
                <div class="card">
                  <i class="fas fa-chart-bar"></i>
                  <a href="addAlat.php" style="width: 250px; padding: 5px;">
                    <h3>Tambah Alat</h3>
                  </a>
                  <p>Silahkan tambahkan alat dengan klik tombol di atas</p>
                </div>

                <div class="card">
                  <i class="fas fa-user-edit"></i>
                  <a href="addAdmin.php" style="width: 250px; padding: 5px;">
                    <h3>Tambah Admin</h3>
                  </a>
                  <p>Silahkan tambahkan akun admin dengan klik tombol di atas</p>
                </div>

                <div class="card">
                  <i class="fas fa-users"></i>
                  <a href="addPelapor.php" style="width: 250px; padding: 5px;">
                    <h3>Tambah Akun Pelapor</h3>
                  </a>
                  <p>Silahkan tambahkan akun pelapor dengan klik tombol di atas</p>
                </div>

                <div class="card">
                  <i class="fas fa-user-check"></i>
                  <a href="addKoordinator.php" style="width: 250px; padding: 5px;">
                    <h3>Tambah Akun Koordinator</h3>
                  </a>
                  <p>Silahkan tambahkan akun koordinator dengan klik tombol di atas</p>
                </div>
              </div>
            </section>
          </div>
        </span>
      </body>

      </html>
<?php } ?>