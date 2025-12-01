<?php
include 'koneksi.php'; // Pastikan file ini memakai MySQLi OOP

// --- 1. VALIDASI DATA MASUK ---
if (!isset($_GET['id']) || !ctype_digit($_GET['id'])) {
    echo "<script>alert('ID produk tidak valid!');window.location='index.php';</script>";
    exit();
}

$id = (int) $_GET['id']; // Casting aman

// --- 2. MENGAMBIL DATA PRODUK DENGAN PREPARED STATEMENT ---
$sql = "SELECT nama_produk, harga, gambar, deskripsi FROM produk WHERE id = ?";

if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

$stmt = $koneksi->prepare($sql);
if (!$stmt) {
    die("Prepare gagal: " . $koneksi->error);
}

$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();
$stmt->close();
$koneksi->close();

// --- 3. VALIDASI HASIL QUERY ---
if (!$data) {
    echo "<script>alert('Produk tidak ditemukan!');window.location='index.php';</script>";
    exit();
}

// --- Sanitasi output ---
$nama_produk = htmlspecialchars($data['nama_produk']);
$gambar = htmlspecialchars($data['gambar']);
$deskripsi = !empty($data['deskripsi']) ? nl2br(htmlspecialchars($data['deskripsi'])) : "Belum ada deskripsi.";
$harga = number_format($data['harga'], 0, ',', '.');

// Cek file gambar
$path_gambar = "gambar/" . $gambar;
if (!file_exists($path_gambar) || empty($gambar)) {
    $path_gambar = "gambar/no-image.png"; // fallback
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Detail Produk - <?= $nama_produk ?></title>
    <style>
        body { font-family: sans-serif; background-color: #f4f4f4; padding: 20px; }
        .container {
            background-color: white;
            width: 60%;
            margin: auto;
            padding: 30px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            border-radius: 8px;
            overflow: hidden;
        }
        .gambar-produk {
            float: left;
            width: 45%;
            text-align: center;
        }
        .
