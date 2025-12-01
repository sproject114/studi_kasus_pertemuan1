<?php include('koneksi.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <title>ABSENSI MAHASISWA</title>
    <style>
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #ddd; padding: 8px; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h1>Data ABSENSI MAHASISWA</h1>
    <a href="tambah.php">+ Tambah absensi</a>
    <br><br>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>NPM</th>
                <th>Nama MAHASISWA</th>
                <th>Kelas</th>
                <th>Status</th>
                <th>Bukti Foto</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = "SELECT * FROM absensi_ukri ORDER BY id ASC";
            $result = mysqli_query($koneksi, $query);
            $no = 1;
            while($row = mysqli_fetch_assoc($result)) {
            ?>
            <tr>
                <td><?php echo $no; ?></td>
                
                <td><?php echo htmlspecialchars($row['npm']); ?></td>
                
                <td><?php echo htmlspecialchars($row['nama_mahasiswa']); ?></td>
                
                <td><?php echo htmlspecialchars($row['kelas']); ?></td>

                <td><?php echo htmlspecialchars($row['status']); ?></td>
                
                <td style="text-align: center;">
                    <img src="gambar/<?php echo htmlspecialchars($row['bukti_foto']); ?>" style="width: 80px;">
                </td>
                
                <td>
                    <a href="detail.php?id=<?php echo $row['id']; ?>">Detail</a> | 
                    <a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a> |
                    <a href="hapus.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Yakin hapus data?')">Hapus</a>
                </td>
            </tr>
            <?php
                $no++;
            }
            ?>
        </tbody>
    </table>
</body>
</html>

