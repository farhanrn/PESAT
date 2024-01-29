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
    <title>Data</title>
    <link rel="stylesheet" href="../assets/style/admin_style.css" />
    <link rel="icon" href="../assets/favicon.ico" />
    <!-- Font Awesome Cdn Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
  </head>

  <body>
    <div class="container">
      <!-- Kode Menu SideBar-->
      <nav>
        <ul>
          <li><a href="dashboard.php" class="logo">
              <img src="../assets/img/logo.webp" alt="">
              <span class="nav-item">Data</span>
            </a></li>
          <li><a href="../index.php">
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
        <!-- tabell -->
        <h4>
          <center>DAFTAR LAPORAN ALAT YANG MASUK</center>
        </h4>
        <!--Include kode php-->
        <?php include "../connection/connect.php"; ?>
        <tr class="table-danger">
          <br>
          <div class="table-container">
          <table class="my-3 table table-bordered">
            <thead>
              <tr class="table-primary">
                <th scope="col">Id</th>
                <th scope="col">tanggal</th>
                <th scope="col">Nama Pelapor</th>
                <th scope="col">Nama Teknisi</th>
                <th scope="col">Nama Alat</th>
                <th scope="col">Deskripsi Kerusakan</th>
                <th scope="col">Gambar Alat</th>
                <th scope="col">Status</th>
                <th colspan="1">Aksi</th>
              </tr>
            </thead>
            <?php
            $query = "SELECT * FROM pelapor1 order by id";
            $hasil = mysqli_query($connect, $query);
            $nomor = 1;

            while ($data = mysqli_fetch_assoc($hasil)) {

              ?>
              <tbody>
                <tr>
                  <td scope="row">
                    <?= $nomor++ ?>
                  </td>
                  <td scope="row">
                    <?= $data['tanggal'] ?>
                  </td>
                  <td scope="row">
                    <?= $data['nama_pelapor'] ?>
                  </td>
                  <td scope="row">
                    <?= $data['nama_teknisi'] ?>
                  </td>
                  <td scope="row">
                    <?= $data['alat'] ?>
                  </td>
                  <td scope="row">
                    <?= $data['deskripsi_kerusakan'] ?>
                  </td>
                  <td scope="row">
                    <a href="../alat/<?= $data['foto'] ?>" data-lightbox="images">
                    <img src="../alat/<?= $data['foto'] ?>" width="50px">
                  </td>
                  <td scope="row">
                    <?= $data['status'] ?>
                  </td>
                  <td scope="row">
                    <a href="edit_data.php?id=<?= $data['id'] ?>" class="edit-btn">Edit</a>
                    <a href="delete_data.php?id=<?= $data['id'] ?>" class="delete-btn"
                      onclick="return confirm('Apakah anda yakin menghapus data ini?')">Hapus</a>
                  </td>
                </tr>
              </tbody>
              <?php
            }
            ?>
          </table>
          </div>
      </section>
    </div>
  </body>

  </html>
</span>