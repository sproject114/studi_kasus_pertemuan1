<?php
include 'koneksi.php';

$id          = $_POST['id'];
$nama_produk = $_POST['nama_produk'];
$harga       = $_POST['harga'];
$gambar      = $_FILES['gambar_produk']['name'];

// KONDISI 1: Jika user mengganti gambar
if($gambar != "") {
    $ekstensi_diperbolehkan = array('png','jpg','jpeg');
    $x = explode('.', $gambar);
    $ekstensi = strtolower(end($x));
    $file_tmp = $_FILES['gambar_produk']['tmp_name'];
    $angka_acak = rand(1,999);
    $nama_gambar_baru = $angka_acak.'-'.$gambar; 

    if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {
        move_uploaded_file($file_tmp, 'gambar/'.$nama_gambar_baru);
        
        // Query Update dengan gambar
        $query = "UPDATE produk SET nama_produk = ?, harga = ?, gambar = ? WHERE id = ?";
$stmt = $koneksi->prepare($query);
        
        // "sisi" = String (nama), Integer (harga), String (file), Integer (id)
        $stmt->bind_param("sisi", $nama_produk, $harga, $nama_gambar_baru, $id);
        
        if($stmt->execute()){
            echo "<script>alert('Data berhasil diubah.');window.location='index.php';</script>";
        } else {
            die ("Gagal update: " . $stmt->error);
        }
    } else {     
        echo "<script>alert('Ekstensi salah.');window.location='index.php';</script>";
    }
} 
// KONDISI 2: Jika user TIDAK mengganti gambar
else {
    // Query Update TANPA gambar
    $query = "UPDATE produk SET nama_produk = ?, harga = ? WHERE id = ?";
    $stmt = $koneksi->prepare($query);
    
    // "sii" = String (nama), Integer (harga), Integer (id)
    $stmt->bind_param("sii", $nama_produk, $harga, $id);
    
    if($stmt->execute()){
        echo "<script>alert('Data berhasil diubah.');window.location='index.php';</script>";
    } else {
        die ("Gagal update: " . $stmt->error);
    }
}

// Jangan lupa tutup statement
if(isset($stmt)) $stmt->close();
?>
