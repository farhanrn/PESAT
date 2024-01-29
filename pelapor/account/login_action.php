<?php
session_start();

include "../../connection/connect.php";

// Menerima Data

$username = $_POST["username"];
$password = $_POST["password"];

$sql = "SELECT * FROM user WHERE username= '$username' and password= '$password' ";
$hasil = mysqli_query($connect, $sql);
$jumlah = mysqli_num_rows($hasil);

if ($jumlah > 0) {
    $row = mysqli_fetch_assoc($hasil);
    $_SESSION["id"] = $row["id"];
    $_SESSION["username"] = $row["username"];
    $_SESSION["nama"] = $row["nama"];
    $_SESSION["email"] = $row["email"];
    $_SESSION['password'] = $row['password'];
    
    header("Location:./../homepage.php");
}else{
    $_SESSION['error'] = "Username atau Password Salah!";
    header("Location:login.php");
}
?>