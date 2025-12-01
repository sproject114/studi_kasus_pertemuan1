<?php
include 'koneksi.php';

// Mendapatkan data dari formulir (POST)
$id             = $_POST['id']; // ID baris yang akan diubah
$npm            = $_POST['npm'];
$nama_mahasiswa = $_POST['nama_mahasiswa'];
$kelas          = $_POST['kelas'];
$status         = $_POST['status'];
$bukti_foto     = $_FILES['bukti_foto']['name']; // Nama file bukti foto

// KONDISI 1: Jika user mengganti bukti foto
if($bukti_foto != "") {
    $ekstensi_diperbolehkan = array('png','jpg','jpeg');
    $x = explode('.', $bukti_foto);
    $ekstensi = strtolower(end($x));
    $file_tmp = $_FILES['bukti_foto']['tmp_name'];
    $angka_acak = rand(1,999);
    $nama_bukti_baru = $angka_acak.'-'.$bukti_foto; 

    if(in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
        
        // Pindahkan file baru
        move_uploaded_file($file_tmp, 'gambar/'.$nama_bukti_baru);
        
        // Query Update DENGAN bukti foto
        // Update 5 kolom: npm, nama, kelas, status, dan bukti_foto
        $query = "UPDATE absensi SET npm = ?, nama_mahasiswa = ?, kelas = ?, status = ?, bukti_foto = ? WHERE id = ?";
        $stmt = $koneksi->prepare($query);
        
        // "sssssi" = String, String, String, String, String (bukti_foto), Integer (id)
        $stmt->bind_param("sssssi", $npm, $nama_mahasiswa, $kelas, $status, $nama_bukti_baru, $id);
        
        if($stmt->execute()){
            echo "<script>alert('Data absensi berhasil diubah.');window.location='index.php';</script>";
        } else {
            die ("Gagal update: " . $stmt->error);
        }
    } else {    
        echo "<script>alert('Ekstensi foto salah.');window.location='index.php';</script>";
    }
} 
else {

    $query = "UPDATE absensi SET npm = ?, nama_mahasiswa = ?, kelas = ?, status = ? WHERE id = ?";
    $stmt = $koneksi->prepare($query);
    
    $stmt->bind_param("ssssi", $npm, $nama_mahasiswa, $kelas, $status, $id);
    
    if($stmt->execute()){
        echo "<script>alert('Data absensi berhasil diubah.');window.location='index.php';</script>";
    } else {
        die ("Gagal update: " . $stmt->error);
    }
}

if(isset($stmt)) $stmt->close();

?>