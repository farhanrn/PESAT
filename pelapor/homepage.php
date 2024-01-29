<?php 
session_start();
if (!isset($_SESSION["username"])){
  header("location: account/login.php");
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Halaman Pelapor</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link rel="icon" href="../assets/favicon.ico" />
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/index_style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: FlexStart
  * Updated: Jan 09 2024 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/flexstart-bootstrap-startup-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->

  <!-- =======================================================
  * Coder : Interns Electrical Engineer Politeknik Negeri Ujung Pandang, Jurusan Teknik Elektro Politeknik Negeri Ujung Pandang
            Program studi D4 Teknologi Rekayasa Jaringa Telekomunikasi

            Frinst Yehezkiel Frans Bakku
            Cindy Imanuella Mangayuk
            Farhan Rahman
  -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="index.php" class="logo d-flex align-items-center">
        <img src="assets/img/BMKG.png" alt="">
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li class="dropdown"><a href=""><span>Akun</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="account/logout.php">Logout</a></li>
            </ul>
          </li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
    </div>
  </header>

  <section id="services" class="services">

    <div class="container aos-init aos-animate" data-aos="fade-up">

      <header class="section-header">

        <p>Selamat Datang <?php echo $_SESSION["nama"]?>! Yuk jelajahi laporan kamu</p>
      </header>

      <div class="row gy-4">

        <div class="col-lg-4 col-md-6 aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
          <div class="service-box blue">
            <i class="ri-discuss-line icon"></i>
            <h3>Buat Laporan</h3>
            <p>Buat laporan kerusakan alat dengan mengisi form yang nantinya akan dibaca teknisi</p>
            <a href="form/formulir.php" class="read-more"><span>Klik Disini</span> <i class="bi bi-arrow-right"></i></a>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 aos-init aos-animate" data-aos="fade-up" data-aos-delay="300">
          <div class="service-box orange">
            <i class="ri-discuss-line icon"></i>
            <h3>Cek Progres Laporan</h3>
            <p>Cek Progres laporan mu disini, status akan menunjukkan apakah sedang diproses atau sudah selesai</p>
            <a href="track/status.php" class="read-more"><span>Klik Disini</span> <i class="bi bi-arrow-right"></i></a>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 aos-init aos-animate" data-aos="fade-up" data-aos-delay="400">
          <div class="service-box green">
            <i class="ri-discuss-line icon"></i>
            <h3>Umpan Balik</h3>
            <p>Kami sangat menghargai <i>feedback</i> yang membangun, yuk isi feedback mengenai website ini</p>
            <a href="feedback/feedback.php" class="read-more"><span>Klik Disini</span> <i
                class="bi bi-arrow-right"></i></a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>