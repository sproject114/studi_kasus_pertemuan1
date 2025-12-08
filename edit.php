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
        echo "<script>alert('Data absensi tidak ditemukan');window.location='index.php';</script>";
    }
} else {
     echo "<script>alert('ID tidak ditemukan');window.location='index.php';</script>";
     exit();
}
?>
<!DOCTYPE html>
<html>
<head> <title>Edit Data Absensi</title> </head>
<body>
    <h1>Edit Data Absensi Mahasiswa</h1>
    <form method="POST" action="proses_edit.php" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
        
        <label>Nama Mahasiswa</label><br>
        <input type="text" name="nama_mahasiswa" value="<?php echo $data['nama_mahasiswa']; ?>" required><br><br>
        
        <label>NPM</label><br>
        <input type="text" name="npm" value="<?php echo $data['npm']; ?>" required><br><br>
        
        <label>Kelas</label><br>
        <input type="text" name="kelas" value="<?php echo $data['kelas']; ?>" required><br><br>
        
        <label>Status Kehadiran</label><br>
        <select name="status_kehadiran" required>
            <option value="Hadir" <?php if ($data['status_kehadiran'] == 'Hadir') echo 'selected'; ?>>Hadir</option>
            <option value="Sakit" <?php if ($data['status_kehadiran'] == 'Sakit') echo 'selected'; ?>>Sakit</option>
            <option value="Izin" <?php if ($data['status_kehadiran'] == 'Izin') echo 'selected'; ?>>Izin</option>
        </select><br><br>
        
        <label>Bukti Foto Saat Ini</label><br>
        <img src="gambar/<?php echo $data['bukti_foto']; ?>" style="width: 120px;"><br><br>
        
        <label>Ganti Bukti Foto</label><br>
        <input type="file" name="bukti_foto"><br><br>
        
        <button type="submit">Update Data Absensi</button>
        <a href="index.php">Batal</a>
    </form>
</body>
</html>