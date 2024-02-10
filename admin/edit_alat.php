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

        <section class="main1">
            <h4>
                <center>EDIT DATA LAPORAN ALAT YANG MASUK</center>
            </h4>

            <?php
            include "../connection/connect.php";

            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $query = "SELECT * FROM alat WHERE id=$id";
                $hasil = mysqli_query($connect, $query);
                $data = mysqli_fetch_assoc($hasil);
            }


            if (isset($_POST['submit'])) {
                $alat = $_POST['nama_alat'];

                $query = "UPDATE alat SET alat='$alat' WHERE id=$id";
                mysqli_query($connect, $query);

                header('Location: data_alat.php');
            }
            ?>

            <form action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $data['id'] ?>">
                <div class="form-group">
                    <label for="Nama Alat">Nama Alat</label>
                    <input type="text" name="nama_alat" id="nama_alat" class="form-control"
                        value="<?= $data['alat'] ?>" required>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
            </form>
        </section>
    </div>
</body>

</html>
<?php } ?>