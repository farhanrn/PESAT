<?php include "../connection/connect.php";

session_start();
if (!isset($_SESSION["username"])) {
    header("location: ./../index.php");
    exit;
}
if ($_SESSION['role'] === 'admin') {
    header("Location:./../admin/dashboard.php");
} else if ($_SESSION['role'] === 'teknisi') {
    header("Location:./../teknisi/dashboard.php");
} else if ($_SESSION['role'] === 'pelapor') {
    header("Location:./../pelapor/homepage.php");
} else {
    ?>

            <!DOCTYPE html>
            <html lang="en">

            <head>
                <meta charset="UTF-8" />
                <title>Data</title>
                <link rel="stylesheet" href="style.css" />
                <link rel="icon" href="img/favicon.ico" />
                <!-- Font Awesome Cdn Link -->
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
                <!-- Bootstrap CSS Link -->
                <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
            </head>

            <body>
                <!-- <div class="container"> -->
                <section class="main">
                    <!-- table -->
                    <h4>
                        <center>DAFTAR LAPORAN ALAT YANG MASUK</center>
                    </h4>

                    <div class="logout-container d-flex justify-content-end">
                        <a href="../logout.php" class="btn btn-primary tombol">Logout</a>
                        <!-- <button class=" btn btn-lg btn-primary" href="../logout.php" >Logout</button> -->
                    </div>
                    <!--Include PHP code-->
            <?php include "../connection/connect.php"; ?>
                    <div class="table-container">
                        <table class="my-3 table table-bordered table-responsive-md">
                            <thead>
                                <tr class="table-primary text-center">
                                    <th scope="col">Id</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Nama Pelapor</th>
                                    <th scope="col">Nama Teknisi</th>
                                    <th scope="col">Nama Alat</th>
                                    <th scope="col">Deskripsi Kerusakan</th>
                                    <th scope="col">Gambar Alat</th>
                                    <th scope="col">Status</th>
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
                                                <img src="../alat/<?= $data['foto'] ?>">
                                            </a>
                                        </td>
                                        <td scope="row">
                                    <?= $data['status'] ?>
                                        </td>
                                    </tr>
                                </tbody>
                        <?php
                        }
                        ?>
                        </table>
                    </div>
                </section>
                <!-- </div> -->
            </body>

            </html>
<?php } ?>