<?php
include 'koneksi.php';

// Validasi: Cek apakah ada ID di URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // --- QUERY AMAN (SECURE) ---
    // Kita mengambil data spesifik berdasarkan ID
    $query = "SELECT * FROM produk WHERE id = ?";
    
    $stmt = $koneksi->prepare($query);
    $stmt->bind_param("i", $id); // "i" artinya integer
    $stmt->execute();
    
    $result = $stmt->get_result();
    $data = $result->fetch_assoc();
    
    // Jika ID diketik ngawur di URL dan data tidak ditemukan
    if (!$data) {
        echo "<script>alert('Produk tidak ditemukan!');window.location='index.php';</script>";
        exit();
    }
} else {
    // Jika user membuka detail.php tanpa membawa ID
    echo "<script>alert('Silakan pilih produk terlebih dahulu.');window.location='index.php';</script>";
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Detail Produk - <?php echo $data['nama_produk']; ?></title>
    <style>
        /* CSS Sederhana untuk Tampilan Card */
        body { font-family: sans-serif; background-color: #f4f4f4; padding: 20px; }
        .container {
            background-color: white;
            width: 60%;
            margin: auto;
            padding: 20px;
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            border-radius: 5px;
            overflow: hidden; /* Clear float */
        }
        .gambar-produk {
            float: left;
            width: 40%;
            text-align: center;
        }
        .gambar-produk img {
            max-width: 100%;
            border-radius: 5px;
        }
        .info-produk {
            float: right;
            width: 55%;
        }
        .harga {
            color: #d35400;
            font-size: 24px;
            font-weight: bold;
        }
        .tombol-kembali {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            background-color: #333;
            color: white;
            padding: 10px 20px;
            border-radius: 4px;
        }
.tombol-kembali:hover { background-color: #555; }
    </style>
</head>
<body>

    <div class="container">
        <h1>Detail Produk</h1>
        <hr>
        
        <div class="gambar-produk">
            <img src="gambar/<?php echo $data['gambar']; ?>" alt="<?php echo $data['nama_produk']; ?>">
        </div>

        <div class="info-produk">
            <h2><?php echo htmlspecialchars($data['nama_produk']); ?></h2>
            
            <p class="harga">Rp <?php echo number_format($data['harga'], 0, ',', '.'); ?></p>
            
            <p><strong>ID Produk:</strong> <?php echo $data['id']; ?></p>
            
            <p><strong>Deskripsi:</strong><br>
            Ini adalah halaman detail untuk produk <?php echo $data['nama_produk']; ?>. 
            Di halaman ini Anda bisa menampilkan informasi yang lebih lengkap seperti spesifikasi, stok, dan ulasan.
            </p>

            <a href="index.php" class="tombol-kembali">&laquo; Kembali ke Daftar</a>
        </div>
    </div>

</body>
</html>
