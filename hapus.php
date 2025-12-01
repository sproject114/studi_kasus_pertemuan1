<?php
include 'koneksi.php';

// Mendapatkan ID dari URL (GET)
$id = $_GET["id"];

// LANGKAH 1: Ambil nama file bukti foto (Select Secure)
// Ganti nama tabel: produk -> absensi
// Ganti nama kolom: gambar -> bukti_foto
$query_pilih = "SELECT bukti_foto FROM absensi WHERE id = ?";
$stmt_pilih = $koneksi->prepare($query_pilih);
$stmt_pilih->bind_param("i", $id);
$stmt_pilih->execute();
$result_pilih = $stmt_pilih->get_result();
$data = $result_pilih->fetch_assoc();

if (!$data) {
    // Jika data tidak ditemukan
    echo "<script>alert('Data absensi tidak ditemukan.');window.location='index.php';</script>";
    exit;
}

// Hapus fisik bukti foto (jika ada dan file-nya ada)
// Ganti $data['gambar'] menjadi $data['bukti_foto']
if ($data['bukti_foto'] != "" && file_exists("gambar/".$data['bukti_foto'])) {
    unlink("gambar/".$data['bukti_foto']);
}
$stmt_pilih->close();

// LANGKAH 2: Hapus data dari database (Delete Secure)
// Ganti nama tabel: produk -> absensi
$query_hapus = "DELETE FROM absensi WHERE id = ?";
$stmt_hapus = $koneksi->prepare($query_hapus);
$stmt_hapus->bind_param("i", $id);

if($stmt_hapus->execute()) {
    echo "<script>alert('Data absensi berhasil dihapus.');window.location='index.php';</script>";
} else {
    die("Gagal menghapus data: " . $stmt_hapus->error);
}

$stmt_hapus->close();
?>