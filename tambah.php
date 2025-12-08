<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data Absensi</title>
</head>
<body>
    <h1>Tambah Data Absensi Mahasiswa</h1>
    <form method="POST" action="proses_tambah.php" enctype="multipart/form-data">
        
        <label>Nama Mahasiswa</label><br>
        <input type="text" name="nama_mahasiswa" required><br><br>
        
        <label>NPM</label><br>
        <input type="text" name="npm" required><br><br>
        
        <label>Kelas</label><br>
        <input type="text" name="kelas" required><br><br>

        <label>Status Kehadiran</label><br>
        <select name="status_kehadiran" required>
            <option value="Hadir">Hadir</option>
            <option value="Sakit">Sakit</option>
            <option value="Izin">Izin</option>
        </select><br><br>
        
        <label>Bukti Foto (Selfie Kehadiran / Surat Sakit/Izin)</label><br>
        <input type="file" name="bukti_foto" required><br><br>
        
        <button type="submit">Simpan Data Absensi</button>
        <a href="index.php">Batal</a>
    </form>
</body>
</html>