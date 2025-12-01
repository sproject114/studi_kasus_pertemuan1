<?php include('koneksi.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <title>TUGAS10_CRUD</title>
    <style>
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #ddd; padding: 8px; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h1>Data Produk</h1>
    <a href="tambah.php">+ Tambah Produk</a>
    <br><br>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Gambar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = "SELECT * FROM produk ORDER BY id ASC";
            $result = mysqli_query($koneksi, $query);
            $no = 1;
            while($row = mysqli_fetch_assoc($result)) {
            ?>
            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo htmlspecialchars($row['nama_produk']); ?></td>
                <td>Rp <?php echo number_format($row['harga'],0,',','.'); ?></td>
                <td style="text-align: center;">
                    <img src="gambar/<?php echo $row['gambar']; ?>" style="width: 80px;">
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

