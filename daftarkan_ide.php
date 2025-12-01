<?php
// Simpan data ke file jika form disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $universitas = $_POST['universitas'];
    $nama_bisnis = $_POST['nama_bisnis'];
    $kategori = $_POST['kategori'];
    $deskripsi = $_POST['deskripsi'];

    // Menyimpan data ke file
    $data = "$nama\t$nim\t$universitas\t$nama_bisnis\t$kategori\t$deskripsi\n";
    file_put_contents('data_ide.txt', $data, FILE_APPEND);
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Pendaftaran Ide Bisnis</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-b from-gray-900 via-gray-700 to-gray-100 font-sans text-gray-900">

    <!-- 🔹 NAVBAR -->
<nav class="fixed top-0 left-0 w-full 
            bg-gradient-to-r from-gray-300/85 via-gray-400/80 to-gray-500/75 
            backdrop-blur-md shadow-md py-4 px-10 flex justify-between items-center 
            rounded-b-xl z-50 border-b border-gray-300/30 transition-all duration-300">
  
  <!-- 🔸 Logo kiri -->
  <h1 class="text-2xl font-bold text-black drop-shadow-sm tracking-wide select-none">
    UMKM DIGITAL HUB
  </h1>

  <!-- 🔸 Menu kanan (Home, Database, State + Daftar Ide) -->
  <div class="flex items-center space-x-8">
    <ul class="flex space-x-8 font-semibold italic">
      <li><a href="index.php" class="text-black hover:text-white  px-4 py-2 rounded-lg transition duration-300">Home</a></li>
      <li><a href="database_ide.php" class="text-black hover:text-white  px-4 py-2 rounded-lg transition duration-300">Database</a></li>
      <li><a href="infografis.php" class="text-black hover:text-white  px-4 py-2 rounded-lg transition duration-300">State</a></li>
    </ul>
  </div>
</nav>



    <!-- 🔸 Konten utama -->
    <main class="flex justify-center items-center py-24 sm:py-28 min-h-[calc(100vh-64px)] px-4">
        <div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-lg mt-16">
            <h1 class="text-xl sm:text-2xl font-semibold text-gray-900 mb-8 text-center">Formulir Pendaftaran Ide Bisnis</h1>
            
            <form action="daftarkan_ide.php" method="POST" class="space-y-6">
                <div>
                    <label for="nama" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                    <input type="text" id="nama" name="nama" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:ring-[#d96600] focus:border-[#d96600] sm:text-sm" required>
                </div>

                <div>
                    <label for="nim" class="block text-sm font-medium text-gray-700">NIM (Nomor Induk Mahasiswa)</label>
                    <input type="text" id="nim" name="nim" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:ring-[#d96600] focus:border-[#d96600] sm:text-sm" required>
                </div>

                <div>
                    <label for="universitas" class="block text-sm font-medium text-gray-700">Asal Universitas</label>
                    <input type="text" id="universitas" name="universitas" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:ring-[#d96600] focus:border-[#d96600] sm:text-sm" required>
                </div>

                <div>
                    <label for="nama_bisnis" class="block text-sm font-medium text-gray-700">Nama Ide Bisnis</label>
                    <input type="text" id="nama_bisnis" name="nama_bisnis" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:ring-[#d96600] focus:border-[#d96600] sm:text-sm" required>
                </div>

                <div>
                    <label for="kategori" class="block text-sm font-medium text-gray-700">Kategori Bisnis</label>
                    <select id="kategori" name="kategori" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 bg-white focus:ring-[#d96600] focus:border-[#d96600] sm:text-sm" required>
                        <option>F&B (Makanan & Minuman)</option>
                        <option>Jasa Digital</option>
                        <option>Fashion</option>
                        <option>Pendidikan</option>
                        <option>Kreatif</option>
                    </select>
                </div>

                <div>
                    <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi Singkat Ide</label>
                    <textarea id="deskripsi" name="deskripsi" rows="4" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:ring-[#d96600] focus:border-[#d96600] sm:text-sm resize-y" required></textarea>
                </div>

                <div class="pt-4">
                    <button type="submit" class="w-full flex justify-center py-2.5 px-4 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-[#d96600] hover:bg-[#b35400] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#d96600] transition duration-150">
                        Kirim Ide Bisnis
                    </button>
                </div>
            </form>
        </div>
    </main>
</body>
</html>
