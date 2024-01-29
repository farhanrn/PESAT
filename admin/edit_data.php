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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Data</title>
    <link rel="stylesheet" href="../assets/style/admin_style.css" />
    <!-- Font Awesome Cdn Link -->
    <link rel="stylesheet" href="../assets/style/admin_style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <style>
        /* .container {
            display: flex;
            flex-wrap: wrap;
            margin: 0 auto;
            max-width: 1200px;
        }

        nav {
            order: 1;
            flex: 0 0 200px;
            margin-right: 20px;
        } */

        .main1 {
            grid-area: main;
            position: relative;
            padding: 20px;
            width: 100%;
            order: 2;
            flex: 1 1 0px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-size: 1.1rem;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            font-size: 1rem;
            line-height: 1.5;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .form-control:focus {
            outline: none;
            box-shadow: 0 0 2px 1px rgba(0, 123, 255, 0.25);
        }

        .btn {
            display: block;
            width: 100%;
            padding: 10px;
            font-size: 1.1rem;
            font-weight: bold;
            text-align: center;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #0069d9;
        }

        .btn:focus {
            outline: none;
            box-shadow: none;
        }

        .main1 form {
            width: 100%;
        }

        .main1 form .btn {
            order: 3;
            width: auto;
            margin-top: 20px;
            margin-left: auto;
            margin-right: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Kode Menu SideBar-->
        <nav>
            <ul>
                <li><a href="index.html" class="logo">
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
                <li><a href="" class="logout">
                        <i class="fas fa-sign-out-alt"></i>
                        <span class="nav-item">Log out</span>
                    </a></li>
            </ul>
        </nav>

        <section class="main1">
            <h4>
                <center>EDIT DATA LAPORAN ALAT YANG MASUK</center>
            </h4>

            <?php
            include "../connection/connect.php";

            function upload()
            {

                $namaFile = $_FILES['gambar']['name'];
                $ukuranFile = $_FILES['gambar']['size'];
                $error = $_FILES['gambar']['error'];
                $tmpName = $_FILES['gambar']['tmp_name'];

                // cek apakah tidak ada gambar yang diupload
                if ($error === 4) {
                    echo "<script>
                            alert('pilih gambar terlebih dahulu!');
                          </script>";
                    return false;
                }

                // cek apakah yang diupload adalah gambar
                $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
                $ekstensiGambar = explode('.', $namaFile);
                $ekstensiGambar = strtolower(end($ekstensiGambar));
                if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
                    echo "<script>
                            alert('yang anda upload bukan gambar!');
                          </script>";
                    return false;
                }

                // cek jika ukurannya terlalu besar
                if ($ukuranFile > 1000000) {
                    echo "<script>
                            alert('ukuran gambar terlalu besar!');
                          </script>";
                    return false;
                }

                // lolos pengecekan, gambar siap diupload
                // generate nama gambar baru
                $namaFileBaru = uniqid();
                $namaFileBaru .= '.';
                $namaFileBaru .= $ekstensiGambar;

                move_uploaded_file($tmpName, '../alat/' . $namaFileBaru);

                return $namaFileBaru;
            }

            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $query = "SELECT * FROM pelapor1 WHERE id=$id";
                $hasil = mysqli_query($connect, $query);
                $data = mysqli_fetch_assoc($hasil);
            }


            if (isset($_POST['submit'])) {
                $gambar = upload();
                $id = $_POST['id'];
                $tanggal = $_POST['tanggal'];
                $nama_pelapor = $_POST['nama_pelapor'];
                $nama_teknisi = $_POST['nama_teknisi'];
                $alat = $_POST['alat'];
                $deskripsi_kerusakan = $_POST['deskripsi_kerusakan'];
                $foto = $gambar;

                $query = "UPDATE pelapor1 SET tanggal='$tanggal', nama_pelapor='$nama_pelapor', nama_teknisi='$nama_teknisi', alat='$alat', deskripsi_kerusakan='$deskripsi_kerusakan', foto='$foto' WHERE id=$id";
                mysqli_query($connect, $query);

                header('Location: data.php');
            }
            ?>

            <form action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $data['id'] ?>">
                <div class="form-group">
                    <label for="tanggal">Tanggal</label>
                    <input type="date" name="tanggal" id="tanggal" class="form-control" value="<?= $data['tanggal'] ?>"
                        required>
                </div>
                <div class="form-group">
                    <label for="nama_pelapor">Nama Pelapor</label>
                    <input type="text" name="nama_pelapor" id="nama_pelapor" class="form-control"
                        value="<?= $data['nama_pelapor'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="nama_teknisi">Nama Teknisi</label>
                    <input type="text" name="nama_teknisi" id="nama_teknisi" class="form-control"
                        value="<?= $data['nama_teknisi'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="alat">Nama Alat</label>
                    <input type="text" name="alat" id="alat" class="form-control" value="<?= $data['alat'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="deskripsi_kerusakan">Deskripsi Kerusakan</label>
                    <textarea name="deskripsi_kerusakan" id="deskripsi_kerusakan" class="form-control"
                        required><?= $data['deskripsi_kerusakan'] ?></textarea>
                </div>
                <div class="form-group">
                    <label for="foto">Gambar Alat</label>
                    <input type="file" name="gambar" id="gambar" class="form-control">
                    <img src=<?= $data['foto'] ?>" alt="" width="100">
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
            </form>
        </section>
    </div>
</body>

</html>