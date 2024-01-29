<?php
session_start();

include "../../connection/connect.php";

//menerima data
//menerima data
$nama = $_POST["nama"];
$username = $_POST["username"];
$email = $_POST["email"];
$password = $_POST["password"];


$sql = "INSERT INTO user (nama, username, email, password) VALUES ('$nama', '$username', '$email', '$password');";
$query = mysqli_query($connect, $sql);

if ($query) {
    header("Location:login.php"); //sukses
} else {
    echo "password yang anda masukkan berbeda <br><a href='regist.php'>Kembali</a>";
}

?>