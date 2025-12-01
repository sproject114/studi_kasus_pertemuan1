<?php
include 'koneksi.php';

$nama_produk = $_POST['nama_produk'];
$harga       = $_POST['harga'];
$gambar      = $_FILES['gambar_produk']['name'];

if($gambar != "") {
    $ekstensi_diperbolehkan = array('png','jpg','jpeg');
    $x = explode('.', $gambar);
    $ekstensi = strtolower(end($x));
    $file_tmp = $_FILES['gambar_produk']['tmp_name'];
    $angka_acak = rand(1,999);
    $nama_gambar_baru = $angka_acak.'-'.$gambar;

    if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {     
        move_uploaded_file($file_tmp, 'gambar/'.$nama_gambar_baru);
        
        // --- BAGIAN SECURE CODING (BIND PARAM) ---
        
        // 1. Siapkan query dengan tanda tanya (?)
        $query = "INSERT INTO produk (nama_produk, harga, gambar) VALUES (?, ?, ?)";
// 2. Prepare statement
        $stmt = $koneksi->prepare($query);
        
        // 3. Bind parameter
        // "sis" artinya: String (nama), Integer (harga), String (gambar)
        $stmt->bind_param("sis", $nama_produk, $harga, $nama_gambar_baru);
        
        // 4. Eksekusi
        if($stmt->execute()){
            echo "<script>alert('Data berhasil ditambah.');window.location='index.php';</script>";
        } else {
            die ("Query gagal dijalankan: " . $stmt->error);
        }
        
        // 5. Tutup statement
        $stmt->close();
        
    } else {     
        echo "<script>alert('Ekstensi gambar salah.');window.location='tambah.php';</script>";
    }
}
