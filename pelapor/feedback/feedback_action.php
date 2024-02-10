<?php include "../../connection/connect.php";

session_start();
if (!isset($_SESSION["username"])){
  header("location: ./../account/login.php");
  exit;
}
if ($_SESSION['role'] === 'koordinator') {
  header("Location:./../../koordinator/koordinator.php");
} else if ($_SESSION['role'] === 'admin') {
  header("Location:./../../admin/dashboard.php"); 
} else if ($_SESSION['role'] === 'teknisi') {
  header("Location:./../../teknisi/dashboard.php"); 
} else {
//menerima data
$nama          = $_POST["nama"];
$email         = $_POST["email"];
$pesan         = $_POST["pesan"];


$sql = "INSERT INTO feedback (nama, email, pesan) VALUE ('$nama', '$email', '$pesan')";
$query  = mysqli_query ($connect,$sql);

if($query){
    header("Location:../homepage.php?message=success");
}else{
    echo 'Gagal';
}
}
?>
