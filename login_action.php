<?php
session_start();

include "./connection/connect.php";

// Menerima Data

$username = $_POST["username"];
$pass = $_POST["password"];  

$sql = "SELECT * FROM akun WHERE username= '$username' and password= '$pass' ";
$hasil = mysqli_query($connect, $sql);
$jumlah = mysqli_num_rows($hasil);

if ($jumlah > 0) {
    $row = mysqli_fetch_assoc($hasil);
    $_SESSION["id_user"] = $row["id_user"];
    $_SESSION["username"] = $row["username"];
    $_SESSION["name"] = $row["name"];
    $_SESSION["email"] = $row["email"];
    $_SESSION['role'] = $row['role'];

    if ($row['role'] === 'admin') {
        header("Location:./admin/dashboard.php");
    } else {
        header("Location:./teknisi/dashboard.php");
    }
}else{
    echo "username atau paswword salah, silahkan login kembali";
}
?>