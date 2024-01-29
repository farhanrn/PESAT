<?php include "../../connection/connect.php";

session_start();
if (!isset($_SESSION["username"])){
  header("location: ./../account/login.php");
  exit;
}
function upload()
{

    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    // cek apakah tidak ada gambar yang diupload
    if ($error === 4) {
        echo "<script>
                alert('pilih gambar terlebih dahulu!');
              </script>";
        return false;
    }

    // cek apakah yang diupload adalah gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
                alert('yang anda upload bukan gambar!');
              </script>";
        return false;
    }

    // cek jika ukurannya terlalu besar
    if ($ukuranFile > 1000000) {
        echo "<script>
                alert('ukuran gambar terlalu besar!');
              </script>";
        return false;
    }

    // lolos pengecekan, gambar siap diupload
    // generate nama gambar baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, '../../alat/' . $namaFileBaru);

    return $namaFileBaru;
}
//menerima data
$tanggal      = $_POST["tanggal"];
$nama         = $_POST["nama_pelapor"];
$alat         = $_POST["alat"];
$deskripsi_kerusakan   = $_POST["deskripsi_kerusakan"];
$nama_foto    = upload() ;


$sql = "INSERT INTO pelapor1 (nama_pelapor,tanggal,alat,deskripsi_kerusakan,foto,status) VALUE ('$nama', '$tanggal', '$alat', '$deskripsi_kerusakan', '$nama_foto', 'Laporan Terkirim')";
$query  = mysqli_query ($connect,$sql);

if($query){
    header("Location:../track/status.php?message=success");
}else{
    echo 'Gagal';
}

?>
