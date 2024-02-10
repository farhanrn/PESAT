<?php
session_start();

include "../connection/connect.php";

// menerima data
$username = $_POST["username"];
$nama = $_POST["name"];
$email = $_POST["email"];
$password = $_POST["password"];

$sql = "INSERT INTO akun (username, name, email, password, role) VALUES ('$username', '$nama', '$email', '$password', 'admin');";
$query = mysqli_query($connect, $sql);

if ($query){
    echo '<script>alert("Data berhasil ditambahkan!");</script>';
    echo '<script>window.location.href = "addAdmin.php";</script>';
}else{
    echo '<script>alert("Silahkan memasukkan data!");</script>';
}

?>