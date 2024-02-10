<?php
include "../../connection/connect.php";
session_start();

if (!isset($_SESSION["username"])) {
    header("location: ../account/login.php");
    exit;
}
if ($_SESSION['role'] === 'koordinator') {
    header("Location:./../../koordinator/koordinator.php");
  } else if ($_SESSION['role'] === 'admin') {
    header("Location:./../../admin/dashboard.php"); 
  } else if ($_SESSION['role'] === 'teknisi') {
    header("Location:./../../teknisi/dashboard.php"); 
  } else {
// Id User Identification

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // pengambilan data gambar dari database

    $get_data = mysqli_fetch_array(mysqli_query($connect, "SELECT foto FROM pelapor1 WHERE id= '$id' "));

    // menghapus data laporan oleh user 
    $query = mysqli_query($connect, "DELETE FROM pelapor1 WHERE id='$id'");

    if ($query) {
        unlink("../../alat/" . $get_data['foto']);
        header("Location : status.php");
    } else {
        header("Location :status.php");
    }
}
?>

<?php
function getStatusButtonClass($status)
{
    switch ($status) {
        case 'Sedang Diproses':
            return 'btn-warning'; // Set to yellow
        case 'Selesai':
            return 'btn-success'; // Set to green
        // Add more cases for other status if needed
        default:
            return 'btn-secondary'; // Set to a default color
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Available Data</title>
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
    <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="../assets/css/index_style.css" rel="stylesheet">

    <!-- Custom CSS Rule -->
    <style>
        .card-body {
            font-size: 14px;
        }

        /* Adjust the font size of $data['alat']  */
        .card-title {
            font-size: 18px;
        }

        .box-update {
            height: 440px;
        }

        .custom-image {
            height: 200px;
            object-fit: cover;
        }
    </style>

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

            <a href="../homepage.php" class="logo d-flex align-items-center">
                <img src="../assets/img/BMKG.png" alt="">
            </a>

            <nav id="navbar" class="navbar">
                <ul>
                    <li class="nav-item"><a class="nav-link" href="../homepage.php">Home</a></li>
                    <li class="dropdown"><a href=""><span>Akun</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="../account/logout.php">Logout</a></li>
                        </ul>
                    </li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->
        </div>
    </header>

    <div class="px-4 py-5 my-5 text-center">
        <img class="d-block mx-auto mb-4" src="../assets/img/data_udh_ada.png" alt="">
        <h1 class="display-5 fw-bold text-body-emphasis">Data Sudah Ada!</h1>
        <div class="col-lg-6 mx-auto">
            <p class="lead mb-4">Laporan yang masuk mungkin sudah dimasukkan</p>
            <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                <a href="formulir.php"><button type="button" class="btn btn-primary btn-lg px-4 gap-3">Buat Laporan
                        Lainnya</button>
                    <a href="../homepage.php"><button type="button"
                            class="btn btn-outline-secondary btn-lg px-4">Kembali</button>
            </div>
        </div>
    </div>
    <!-- Vendor JS Files -->
</body>

</html>
<?php } ?>