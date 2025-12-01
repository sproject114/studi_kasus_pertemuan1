<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data Absensi</title>
</head>
<body>
    <h1>Tambah Absensi Mahasiswa</h1>
    <form method="POST" action="proses_tambah.php" enctype="multipart/form-data">
        
        <label for="npm">NPM</label><br>
        <input type="text" id="npm" name="npm" required><br><br>
        
        <label for="nama_mahasiswa">Nama Mahasiswa</label><br>
        <input type="text" id="nama_mahasiswa" name="nama_mahasiswa" required><br><br>

        <label for="kelas">Kelas</label><br>
        <input type="text" id="kelas" name="kelas" required><br><br>

        <label>Status</label><br>
        <div>
            <label>
                <input type="radio" name="status" value="Hadir" required> Hadir
            </label><br>
            <label>
                <input type="radio" name="status" value="Sakit"> Sakit
            </label><br>
            <label>
                <input type="radio" name="status" value="Izin"> Izin
            </label>
        </div>
        <br>
        
        <label for="bukti_foto">Bukti Foto</label><br>
        <input type="file" id="bukti_foto" name="bukti_foto" required><br><br>
        
        <button type="submit">Simpan Absensi</button>
    </form>
</body>
</html>