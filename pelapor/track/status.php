<?php
include "../../connection/connect.php";
session_start();

if (!isset($_SESSION["username"])) {
    header("location: ../account/login.php");
    exit;
}

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

    <title>Halaman Status</title>
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

    <section id="services" class="services">
        <div class="container aos-init aos-animate" data-aos="fade-up">
            <header class="section-header">
                <p>Cek Status Laporan
                    <?php echo $_SESSION["nama"] ?>
                </p>
                <br>
                <br>

                <div class="container">
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                        <?php
                        $myid = $_SESSION['nama'];
                        $query = mysqli_query($connect, "SELECT * FROM pelapor1 WHERE nama_pelapor = '$myid' ");
                        $no = 1;
                        while ($data = mysqli_fetch_array($query)) {
                            ?>
                            <div class="col">
                                <div class="card shadow-sm box-update">
                                    <!-- Use the actual image file path in the img tag -->
                                    <img src="../../alat/<?php echo $data['foto']; ?>"
                                        class="bd-placeholder-img card-img-top custom-image" alt="Thumbnail Image">
                                    <title>Placeholder</title>
                                    <rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%"
                                        fill="#eceeef" dy=".3em" style="height: 146px;">
                                        <p style="font-size: 22px; margin-bottom: 10px;" <b>
                                            <?php echo $data['alat']; ?></b>
                                        </p>
                                        <p class="card-text" style="font-size: 20px;">
                                            <!-- Adjust the font size as needed -->
                                            <?php echo $data['deskripsi_kerusakan']; ?>
                                        </p>
                                    </text>
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="btn-group">
                                                <button type="button"
                                                    class="btn btn-sm <?php echo getStatusButtonClass($data['status']); ?>">
                                                    <?php echo $data['status']; ?>
                                                </button>
                                            </div>
                                            <small class="text-body-secondary">
                                                <?php echo $data['tanggal']; ?>
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </header>

        </div>

    </section>
    <!-- Vendor JS Files -->
</body>
</html>
