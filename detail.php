<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $query = "SELECT * FROM absensi_ukri WHERE id = ?";
    
    $stmt = $koneksi->prepare($query);
    $stmt->bind_param("i", $id); 
    $stmt->execute();
    
    $result = $stmt->get_result();
    $data = $result->fetch_assoc();
    
    if (!$data) {
        echo "<script>alert('Data absensi tidak ditemukan!');window.location='index.php';</script>";
        exit();
    }
} else {
    echo "<script>alert('Silakan pilih data absensi terlebih dahulu.');window.location='index.php';</script>";
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Detail Absensi - <?php echo $data['nama_mahasiswa']; ?></title>
    <style>
        body { font-family: sans-serif; background-color: #f4f4f4; padding: 20px; }
        .container {
            background-color: white;
            width: 60%;
            margin: auto;
            padding: 20px;
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            border-radius: 5px;
            overflow: hidden; 
        }
        .gambar-produk {
            float: left;
            width: 40%;
            text-align: center;
        }
        .gambar-produk img {
            max-width: 100%;
            border-radius: 5px;
            border: 1px solid #ddd; 
        }
        .info-produk {
            float: right;
            width: 55%;
        }
        .status {
            color: #27ae60; 
            font-size: 20px;
            font-weight: bold;
        }
        .tombol-kembali {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            background-color: #3498db;
            color: white;
            padding: 10px 20px;
            border-radius: 4px;
        }
        .tombol-kembali:hover { background-color: #2980b9; }
    </style>
</head>
<body>

    <div class="container">
        <h1>Detail Data Absensi</h1>
        <hr>
        
        <div class="gambar-produk">
            <img src="gambar/<?php echo $data['bukti_foto']; ?>" alt="Bukti Kehadiran <?php echo $data['nama_mahasiswa']; ?>">
            <p style="font-style: italic; margin-top: 10px;">Bukti Foto Kehadiran/Surat</p>
        </div>

        <div class="info-produk">
            <h2><?php echo htmlspecialchars($data['nama_mahasiswa']); ?></h2>
            
            <p><strong>Status:</strong> <span class="status"><?php echo htmlspecialchars($data['status_kehadiran']); ?></span></p>
            
            <p><strong>NPM:</strong> <?php echo htmlspecialchars($data['npm']); ?></p>
            <p><strong>Kelas:</strong> <?php echo htmlspecialchars($data['kelas']); ?></p>
            
            <p><strong>ID Data Absensi:</strong> <?php echo $data['id']; ?></p>
            
            <p><strong>Keterangan:</strong><br>
            Data ini mencatat kehadiran mahasiswa dalam praktikum. Status: **<?php echo htmlspecialchars($data['status_kehadiran']); ?>**.
            </p>

            <a href="index.php" class="tombol-kembali">&laquo; Kembali ke Daftar Absensi</a>
        </div>
    </div>

</body>
</html>