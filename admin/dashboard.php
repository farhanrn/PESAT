<?php
session_start();


if (!isset($_SESSION["username"])) {
  header("Location:../index.php");
  exit;
}

$id_user = $_SESSION["id_user"];
$username = $_SESSION["username"];
$name = $_SESSION["name"];
$email = $_SESSION["email"];
?>

<span style="font-family: verdana, geneva, sans-serif;">
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8" />
    <title>Dashboard</title>
    <link rel="stylesheet" href="../assets/style/admin_style.css" />
    <link rel="icon" href="../assets/favicon.ico" />
    <link rel="icon" media="(max-width: 640px)" href="favicon.ico">
    <!-- Font Awesome Cdn Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
  </head>

  <body>

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
          <li><a href="../logout.php" class="logout">
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
            <h3>BMKG</h3>
            <p>Meraih Anugerah Manajemen Informasi Arus Mudik 2019</p>

          </div>
          <div class="card">
            <i class="fas fa-chart-bar"></i>
            <h3>International</h3>
            <p>Indonesia Kembali Dipercaya sebagai Anggota Executive Council World Meteorological Organization</p>

          </div>
          <div class="card">
            <i class="fas fa-chart-bar"></i>
            <h3>Social Media</h3>
            <p>Luncurkan Saluran WhatsApp Resmi, BMKG Tembus 4 Juta Followers</p>

          </div>
          <div class="card">
            <i class="fas fa-chart-bar"></i>
            <h3>Accuracy</h3>
            <p>Rutin Hasilkan Data Real Time, BMKG Raih Penghargaan Bhumandala Rajata dari BIG</p>

          </div>
        </div>
      </section>
    </div>
  </body>

  </html>
</span>