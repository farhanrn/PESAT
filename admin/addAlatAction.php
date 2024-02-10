<?php
session_start();

include "../connection/connect.php";

$alat = $_POST["alat"];
$sql = "INSERT INTO alat (id, alat) VALUE ('', '$alat')";
$query = mysqli_query($connect, $sql);

try {
    $query = mysqli_query($connect, $sql);
  
    if (mysqli_affected_rows($connect) > 0) {
      echo "<script>alert('Data Berhasil Ditambahkan'); window.location.href = './addAlat.php';</script>";
    } else {
      echo "Data Tidak Berhasil Direkam";
    }
  } catch (mysqli_sql_exception $e) {
    echo "Terjadi Kesalahan: " . $e->getMessage();
  }
?>
