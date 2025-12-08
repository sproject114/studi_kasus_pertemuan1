<?php
include 'koneksi.php';

if (!isset($_GET["id"])) {
    die("ID data absensi tidak ditemukan.");
}

$id = $_GET["id"];

$query_pilih = "SELECT bukti_foto FROM absensi_ukri WHERE id = ?";
$stmt_pilih = $koneksi->prepare($query_pilih);
$stmt_pilih->bind_param("i", $id);
$stmt_pilih->execute();
$result_pilih = $stmt_pilih->get_result();
$data = $result_pilih->fetch_assoc();

if (!$data) {
    echo "<script>alert('Data absensi tidak ditemukan.');window.location='index.php';</script>";
    exit();
}

if ($data['bukti_foto'] != "" && file_exists("gambar/".$data['bukti_foto'])) {
    unlink("gambar/".$data['bukti_foto']);
}
$stmt_pilih->close();

$query_hapus = "DELETE FROM absensi_ukri WHERE id = ?";
$stmt_hapus = $koneksi->prepare($query_hapus);
$stmt_hapus->bind_param("i", $id);

if($stmt_hapus->execute()) {
    echo "<script>alert('Data absensi berhasil dihapus.');window.location='index.php';</script>";
} else {
    die("Gagal menghapus data: " . $stmt_hapus->error);
}

$stmt_hapus->close();
?>