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
    // $id_user = $_SESSION["id_user"];
    // $username = $_SESSION["username"];
    // $name = $_SESSION["name"];
    // $email = $_SESSION["email"];
    ?>

<!DOCTYPE html>
<html>

<head>
    <title>Menambahkan Alat</title>
    <style>
        ul {
            list-style-type: none;
            overflow: hidden;
        }

        li {
            float: right;
        }

        li a {
            color: #white;
            display: block;
            text-align: center;
            padding: 10px 10px;
            text-decoration: none;
            font-size: 14px;
        }

        li a:hover {
            text-decoration: underline;
        }

        .grid {
            height: 23px;
            position: relative;
            bottom: 4px;
        }

        .signbutton {
            background-color: #4885ed;
            color: #fff;
            border: none;
            border-radius: 3px;
            padding: 7px 10px;
            position: relative;
            bottom: 7px;
            font-weight: bold;
        }

        .logo {
            margin-top: ;
            margin-bottom: ;
        }

        .bar {
            margin: 0 auto;
            width: 575px;
            border-radius: 30px;
            border: 1px solid #dcdcdc;
        }

        .bar:hover {
            box-shadow: 1px 1px 8px 1px #dcdcdc;
        }

        .bar:focus-within {
            box-shadow: 1px 1px 8px 1px #dcdcdc;
            outline: none;
        }

        .voice {
            height: 20px;
            position: relative;
            top: 5px;
            left: 10px;
        }

        .buttons {
            margin-top: 30px;
        }

        .button {
            background-color: #f5f5f5;
            border: none;
            color: #707070;
            font-size: 15px;
            padding: 10px 20px;
            margin: 5px;
            border-radius: 4px;
            outline: none;

        }

        .button.kembali {
            background-color: #ff0000;
            /* Merah */
            border: 2px solid #ff0000;
            /* Garis merah */
            color: #fff;
            /* Teks putih */
        }

        .button.tambahkan {
            background-color: #00ff00;
            /* Hijau */
            border: 2px solid #00ff00;
            /* Garis hijau */
            color: #fff;
            /* Teks putih */
        }

        .button:hover {
            opacity: 0.8;
            /* Mengurangi opacity saat dihover */
        }

        .button:hover {
            border: 1px solid #c8c8c8;
            padding: 9px 19px;
            color: #808080;
        }

        .button:focus {
            border: 1px solid #4885ed;
            padding: 9px 19px;
        }

        /* Tambahkan gaya untuk mengontrol ukuran gambar */
        .logo img {
            max-width: 100%;
            height: auto;
        }
    </style>
    <link rel="icon" href="img/favicon.ico" />
</head>

<body>
    <center>
        <div class="logo">
            <img src="../assets/img/tambahAlat.png">
        </div>
        <div class="bar">
            <!-- Form dimulai di sini -->
            <form action="addAlatAction.php" method="POST">
                <input type="text" name="alat" class="w3-input w3-border">
        </div>
        <div class="buttons">
            <a href="dashboard.php">
                <button class="button kembali" type="button"><b style="color: white;">Kembali</b></button>
            </a>
            <a href="addAlatAction.php">
                <button class="button tambahkan" type="submit"><b>Tambahkan Data Alat</b></button>
            </a>
        </div>
        </form>
    </center>
</body>

</html>
<?php } ?>