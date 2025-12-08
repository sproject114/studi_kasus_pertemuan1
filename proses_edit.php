<?php
include 'koneksi.php';

$id               = $_POST['id'];
$nama_mahasiswa   = $_POST['nama_mahasiswa'];
$npm              = $_POST['npm'];
$kelas            = $_POST['kelas'];
$status_kehadiran = $_POST['status_kehadiran'];
$bukti_foto       = $_FILES['bukti_foto']['name'];

if($bukti_foto != "") {
    $ekstensi_diperbolehkan = array('png','jpg','jpeg');
    $x = explode('.', $bukti_foto);
    $ekstensi = strtolower(end($x));
    $file_tmp = $_FILES['bukti_foto']['tmp_name'];
    $angka_acak = rand(1,999);
    $nama_bukti_foto_baru = $npm . '_' . $angka_acak . '.' . $ekstensi; 

    if(in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
        move_uploaded_file($file_tmp, 'gambar/'.$nama_bukti_foto_baru);
        
        $query = "UPDATE absensi_ukri SET nama_mahasiswa=?, npm=?, kelas=?, status_kehadiran=?, bukti_foto=? WHERE id=?";
        $stmt = $koneksi->prepare($query);
        $stmt->bind_param("sssssi", $nama_mahasiswa, $npm, $kelas, $status_kehadiran, $nama_bukti_foto_baru, $id);
        
        if($stmt->execute()){
            echo "<script>alert('Data absensi berhasil diubah (dengan foto baru).');window.location='index.php';</script>";
        } else {
            die ("Gagal update: " . $stmt->error);
        }
    } else { 
        echo "<script>alert('Ekstensi foto salah.');window.location='index.php';</script>";
    }
} 
else {
    $query = "UPDATE absensi_ukri SET nama_mahasiswa=?, npm=?, kelas=?, status_kehadiran=? WHERE id=?";
    $stmt = $koneksi->prepare($query);
    
    $stmt->bind_param("ssssi", $nama_mahasiswa, $npm, $kelas, $status_kehadiran, $id);
    
    if($stmt->execute()){
        echo "<script>alert('Data absensi berhasil diubah (tanpa ganti foto).');window.location='index.php';</script>";
    } else {
        die ("Gagal update: " . $stmt->error);
    }
}

if(isset($stmt)) $stmt->close();
?>