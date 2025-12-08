<?php 
// Sertakan file koneksi database Anda
include('koneksi.php'); 

// Pastikan koneksi.php mendefinisikan variabel $koneksi
if (!isset($koneksi)) {
    die("Error: Koneksi database belum didefinisikan di koneksi.php");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Absensi Mahasiswa UKRI</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        // Konfigurasi Tailwind untuk warna kustom jika diperlukan
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'primary': '#006e25ff', // Indigo-600
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-50 font-sans p-4 sm:p-8">

    <div class="max-w-7xl mx-auto bg-white p-6 md:p-10 rounded-xl shadow-2xl border border-gray-100">
        
        <h1 class="text-3xl font-extrabold text-gray-900 mb-6 border-b pb-3">
            Data Absensi Praktikum Mahasiswa 
        </h1>

        <div class="mb-8">
            <a href="tambah.php" 
               class="inline-flex items-center px-6 py-2 bg-primary bg-indigo-700 text-white font-semibold rounded-lg shadow-md transition duration-200 ease-in-out transform hover:scale-[1.02]">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                + Tambah Data Absensi
            </a>
        </div>

        <div class="mb-8 p-4 bg-white rounded-lg border border-gray-200">
            <form action="" method="get" class="flex flex-col sm:flex-row items-center space-y-3 sm:space-y-0 sm:space-x-3">
                <label for="cari" class="text-gray-700 font-medium whitespace-nowrap">Cari:</label>
                <input type="text" id="cari" name="cari" 
                       placeholder="Nama Mahasiswa atau NPM" 
                       class="w-full sm:w-auto flex-grow px-4 py-2 border border-gray-300 rounded-lg focus:ring-primary focus:border-primary shadow-sm transition duration-150"
                       value="<?php echo isset($_GET['cari']) ? htmlspecialchars($_GET['cari']) : ''; ?>">
                <button type="submit" 
                        class="w-full sm:w-auto px-6 py-2 bg-green-500 hover:bg-green-600 text-white font-medium rounded-lg shadow-md transition duration-150">
                    Cari
                </button>
                <?php if (isset($_GET['cari'])): ?>
                    <a href="index.php" class="w-full sm:w-auto px-6 py-2 bg-red-500 hover:bg-red-600 text-white font-medium rounded-lg shadow-md text-center transition duration-150">
                        Reset
                    </a>
                <?php endif; ?>
            </form>
        </div>

        <div class="overflow-x-auto shadow-xl rounded-lg border border-gray-200">
            <table class="min-w-full divide-y divide-gray-200">
                
                <thead class="bg-primary text-white">
                    <tr>
                        <th class="px-4 py-3 text-center text-xs font-semibold uppercase tracking-wider">No</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider">NPM</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider">Nama Mahasiswa</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider">Kelas</th>
                        <th class="px-4 py-3 text-center text-xs font-semibold uppercase tracking-wider">Status Kehadiran</th>
                        <th class="px-4 py-3 text-center text-xs font-semibold uppercase tracking-wider">Bukti Foto</th>
                        <th class="px-4 py-3 text-center text-xs font-semibold uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                
                <tbody class="bg-white divide-y divide-gray-100">
                
                <?php
                
                $sql_query = "SELECT * FROM absensi_ukri ORDER BY id DESC";

                if (isset($_GET['cari'])) {
                    $cari = mysqli_real_escape_string($koneksi, $_GET['cari']); // **Penting: Gunakan escape string untuk keamanan!**
                    $sql_query = "SELECT * FROM absensi_ukri 
                                  WHERE nama_mahasiswa LIKE '%$cari%' 
                                  OR npm LIKE '%$cari%' 
                                  ORDER BY id DESC";
                }
                
                $result = mysqli_query($koneksi, $sql_query);
                
                $no = 1;
                
                if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                        
                        // Menentukan warna badge status kehadiran
                        $status_kehadiran = htmlspecialchars($row['status_kehadiran']);
                        $badge_class = 'bg-gray-100 text-gray-800'; // Default
                        if (strtolower($status_kehadiran) == 'hadir') {
                            $badge_class = 'bg-green-100 text-green-800';
                        } elseif (strtolower($status_kehadiran) == 'izin') {
                            $badge_class = 'bg-yellow-100 text-yellow-800';
                        } elseif (strtolower($status_kehadiran) == 'sakit') {
                            $badge_class = 'bg-blue-100 text-blue-800';
                        } elseif (strtolower($status_kehadiran) == 'alpa') {
                            $badge_class = 'bg-red-100 text-red-800';
                        }
                ?>
                
                    <tr class="hover:bg-gray-50 transition duration-100">
                        <td class="px-4 py-3 whitespace-nowrap text-sm font-medium text-gray-900 text-center"><?php echo $no; ?></td>
                        <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500"><?php echo htmlspecialchars($row['npm']); ?></td>
                        <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-900 font-medium"><?php echo htmlspecialchars($row['nama_mahasiswa']); ?></td>
                        <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500"><?php echo htmlspecialchars($row['kelas']); ?></td>
                        <td class="px-4 py-3 whitespace-nowrap text-center">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full <?php echo $badge_class; ?>">
                                <?php echo $status_kehadiran; ?>
                            </span>
                        </td>
                        
                        <td class="px-4 py-3 whitespace-nowrap text-center text-sm">
                            <?php if (!empty($row['bukti_foto'])): ?>
                                <a href="gambar/<?php echo htmlspecialchars($row['bukti_foto']); ?>" target="_blank" class="text-primary hover:text-indigo-700 font-medium">
                                    <img src="gambar/<?php echo htmlspecialchars($row['bukti_foto']); ?>" alt="Foto Bukti" class="w-12 h-12 object-cover rounded-md mx-auto border border-gray-200 shadow-sm">
                                </a>
                            <?php else: ?>
                                <span class="text-gray-400">N/A</span>
                            <?php endif; ?>
                        </td>
                        
                        <td class="px-4 py-3 whitespace-nowrap text-center text-sm font-medium">
                            <a href="edit.php?id=<?php echo $row['id']; ?>" 
                               class="text-yellow-600 hover:text-yellow-800 transition duration-150 ease-in-out mr-3">
                                Edit
                            </a>
                            <span class="text-gray-300">|</span>
                            <a href="hapus.php?id=<?php echo $row['id']; ?>" 
                               onclick="return confirm('Yakin hapus data absensi ini?')"
                               class="text-red-600 hover:text-red-800 transition duration-150 ease-in-out ml-3">
                                Hapus
                            </a>
                        </td>
                        
                    </tr>
                
                <?php
                        $no++;
                    }
                } else {
                ?>
                    <tr>
                        <td colspan='7' class='px-4 py-6 text-center text-gray-500'>
                            Data absensi tidak ditemukan.
                        </td>
                    </tr>
                <?php
                }
                
                // Tutup koneksi setelah selesai
                mysqli_close($koneksi);
                ?>
                
                </tbody>
            </table>
        </div>

    </div>

</body>
</html>