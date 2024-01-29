<?php
include "../connection/connect.php";

//Session check
session_start();


if (!isset($_SESSION["username"])) {
  header("Location:../index.php");
  exit;
}

$id_user = $_SESSION["id_user"];
$username = $_SESSION["username"];
$name = $_SESSION["name"];
$email = $_SESSION["email"];

// id data yang ingin dihapus dari url
$id = $_GET['id'];

// hapus data dari database
$query = "DELETE FROM pelapor1 WHERE id='$id'";

if (mysqli_query($connect, $query)) {
    // redirect ke halaman semua data
    header("Location: data.php");
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($connect);
}

// tutup koneksi
mysqli_close($connect);
?>