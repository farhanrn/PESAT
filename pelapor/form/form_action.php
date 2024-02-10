<?php include "../../connection/connect.php";

session_start();
if (!isset($_SESSION["username"])) {
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

//menerima data // proses data yang diinput user

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tanggal = $_POST["tanggal"];
    $nama = $_POST["nama_pelapor"];
    $alat = $_POST["alat"];
    $deskripsi_kerusakan = $_POST["deskripsi_kerusakan"];
    $nama_foto = upload();

    // Pengecekan data apakah sudah ada dalam database?
    $query = "SELECT * FROM pelapor1 WHERE tanggal = '$tanggal' AND nama_pelapor = '$nama' AND alat = '$alat'";
    $result = $connect->query($query);

    if ($result->num_rows > 0) {
        // Data sudah ada dalam database, munculkan allert
        //echo ('Data Sudah Dilaporkan!');
        header("Location:data_ada.php");
        exit();
    } else {
        $sql = "INSERT INTO pelapor1 (nama_pelapor,tanggal,alat,deskripsi_kerusakan,foto,status) VALUE ('$nama', '$tanggal', '$alat', '$deskripsi_kerusakan', '$nama_foto', 'Laporan Terkirim')";
        $query = mysqli_query($connect, $sql);

    }

    if ($query) {
        
        $nama         = $_POST["nama_pelapor"];
        $alat         = $_POST["alat"];
        $deskripsi_kerusakan   = $_POST["deskripsi_kerusakan"];
    
        $curl = curl_init();
        
        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.fonnte.com/send',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => array(
        'target' => '085343706326',
        'message' => "Haloo! Ada Laporan baru yang masuk.\nNama Pelapor: $nama \nAlat: $alat\nKerusakan: $deskripsi_kerusakan", 
        'delay' => '2',
        'countryCode' => '62', //optional
        ),
        CURLOPT_HTTPHEADER => array(
            'Authorization: #o_nQvfZ!zrFBqKSPLsH' //change TOKEN to your actual token
        ),
        ));
        
        $response = curl_exec($curl);
        if (curl_errno($curl)) {
        $error_msg = curl_error($curl);
        }
        curl_close($curl);
        
        if (isset($error_msg)) {
        echo $error_msg;
        }
        echo $response;
        header("Location:../track/status.php?message=success");
    } else {
        echo 'Gagal';
    }
}

?>