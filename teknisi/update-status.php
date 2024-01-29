<?php include "../connection/connect.php";

session_start();


if (!isset($_SESSION["username"])) {
  header("Location:../index.php");
  exit;
}

// Ambil data dari permintaan POST
$data = json_decode(file_get_contents("php://input"));

// Pastikan data yang diperlukan ada
if (isset($data->id) && isset($data->status)) {
    // Update status di database
    $id = $data->id;
    $status = $data->status;
    $teknisi = $_SESSION["name"];

    $sql = "UPDATE pelapor1 SET status = '$status', nama_teknisi = '$teknisi' WHERE id = $id";

    if ($connect->query($sql) === TRUE) {
        echo json_encode(['success' => true]);
        // header ("location: datatables.php");
    } else {
        echo json_encode(['success' => false, 'error' => $connect->error]);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Data tidak lengkap']);
}

$connect->close();
?>
