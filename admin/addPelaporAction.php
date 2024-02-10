<?php
session_start();

include "../connection/connect.php";

// menerima data
$nama = $_POST["nama"];
$username = $_POST["username"];
$email = $_POST["email"];
$password = $_POST["password"];

$sql = "INSERT INTO user (nama, username, email, password) VALUES ('$nama', '$username', '$email', '$password');";
$query = mysqli_query($connect, $sql);

if ($query){
    echo '<script>alert("Data berhasil ditambahkan!");</script>';
    echo '<script>window.location.href = "addPelapor.php";</script>';
}else{
    echo '<script>alert("Silahkan memasukkan data!");</script>';
}

?>