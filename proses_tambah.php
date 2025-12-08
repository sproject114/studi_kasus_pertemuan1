<?php
include 'koneksi.php';

$nama_mahasiswa  = $_POST['nama_mahasiswa'];
$npm             = $_POST['npm'];
$kelas           = $_POST['kelas'];
$status_kehadiran = $_POST['status_kehadiran'];
$bukti_foto      = $_FILES['bukti_foto']['name'];

if($bukti_foto != "") {
    $ekstensi_diperbolehkan = array('png','jpg','jpeg');
    $x = explode('.', $bukti_foto);
    $ekstensi = strtolower(end($x));
    $file_tmp = $_FILES['bukti_foto']['tmp_name'];
    $angka_acak = rand(1,999);
    $nama_bukti_foto_baru = $npm . '_' . $angka_acak . '.' . $ekstensi;

    if(in_array($ekstensi, $ekstensi_diperbolehkan) === true) { 
        move_uploaded_file($file_tmp, 'gambar/'.$nama_bukti_foto_baru);
        $query = "INSERT INTO absensi_ukri 
                    (nama_mahasiswa, npm, kelas, status_kehadiran, bukti_foto) 
                  VALUES (?, ?, ?, ?, ?)";
        
        $stmt = $koneksi->prepare($query);
        
        $stmt->bind_param("sssss", $nama_mahasiswa, $npm, $kelas, $status_kehadiran, $nama_bukti_foto_baru);
        
        if($stmt->execute()){
            echo "<script>alert('Data absensi mahasiswa berhasil ditambah.');window.location='index.php';</script>";
        } else {
            die ("Query gagal dijalankan: " . $stmt->error);
        }
        
        $stmt->close();
        
    } else { 
        echo "<script>alert('Ekstensi bukti foto yang diunggah tidak diperbolehkan (gunakan: jpg, jpeg, atau png).');window.location='tambah.php';</script>";
    }
} else {
    echo "<script>alert('Bukti foto harus diisi.');window.location='tambah.php';</script>";
}
?>