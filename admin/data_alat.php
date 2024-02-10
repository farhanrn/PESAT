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
    <title>Data</title>
    <link rel="stylesheet" href="../assets/style/admin_style.css" />
    <link rel="icon" href="img/favicon.ico" />
    <!-- Font Awesome Cdn Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
  </head>

  <body>
  <span style="font-family: verdana, geneva, sans-serif;">
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
        <!-- tabell -->
        <h4>
          <center>DAFTAR ALAT-ALAT</center>
        </h4>
        <!--Include kode php-->
        <?php include "../connection/connect.php"; ?>
        <tr class="table-danger">
          <br>
          <div class="table-container">
          <table class="my-3 table table-bordered">
            <thead>
              <tr class="table-primary">
                <th scope="col">No</th>
                <th scope="col">Nama Alat</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <?php
            $query = "SELECT * FROM alat order by id";
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
                    <?= $data['alat'] ?>
                  </td>
                  <td scope="row">
                    <a href="edit_alat.php?id=<?= $data['id'] ?>" class="edit-btn">Edit</a>
                    <a href="delete_alat.php?id=<?= $data['id'] ?>" class="delete-btn"
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
<?php } ?>