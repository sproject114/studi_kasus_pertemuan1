<?php
// Membaca data dari file
$file = 'data_ide.txt';
$data = file_get_contents($file);
$rows = explode("\n", $data);
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Database Ide Bisnis Mahasiswa</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <style>
    .brand-color { color: #4f46e5; }
    .dataTable-input {
      @apply border border-gray-300 rounded-lg px-4 py-2 pl-10 focus:outline-none focus:ring-2 focus:ring-blue-400 w-72;
    }
  </style>
</head>

<body class="bg-gradient-to-b from-gray-900 via-gray-700 to-gray-100 font-sans text-gray-900">

  <!-- 🔹 NAVBAR -->
  <nav class="fixed top-0 left-0 w-full bg-gradient-to-r from-gray-300/85 via-gray-400/80 to-gray-500/75 backdrop-blur-md shadow-md py-4 px-10 flex justify-between items-center rounded-b-xl z-50 border-b border-gray-300/30 transition-all duration-300">
    <h1 class="text-2xl font-bold text-black drop-shadow-sm tracking-wide select-none">
      UMKM DIGITAL HUB
    </h1>

    <div class="flex items-center space-x-8">
      <ul class="flex space-x-8 font-semibold italic">
        <li><a href="index.php" class="text-black hover:text-white px-4 py-2 rounded-lg transition duration-300">Home</a></li>
        <li><a href="database_ide.php" class="text-black text-white px-4 py-2 rounded-lg transition duration-300">Database</a></li>
        <li><a href="infografis.php" class="text-black hover:text-white px-4 py-2 rounded-lg transition duration-300">State</a></li>
      </ul>
    </div>
  </nav>

  <!-- 🔹 HEADER -->
  <header class="pt-28 mb-10 text-center">
    <h1 class="text-4xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-gray-100 via-gray-300 to-white drop-shadow-lg">
      Database Ide Bisnis Mahasiswa
    </h1>
  </header>

  <!-- 🔹 MAIN CONTENT -->
  <main class="max-w-7xl mx-auto pb-10 px-4 sm:px-6 lg:px-8">
    <div class="bg-white shadow-lg rounded-lg p-6">
      
      <!-- 🔍 Custom Search Bar -->
<!-- 🔍 Custom Search Bar (Posisi Sudah Diperbaiki) -->
<div class="relative mb-6 w-80">
  <!-- Icon Search -->
  <i class="fas fa-search absolute left-3 top-3 text-gray-500"></i>

  <!-- Input -->
  <input
    type="text"
    id="customSearch"
    placeholder="Cari data mahasiswa..."
    class="border border-gray-300 rounded-lg px-10 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400 w-80 shadow-sm bg-white"
  />

  <!-- Tombol Hapus -->
  <button
    id="clearSearch"
    class="absolute right-3 top-2.5 text-gray-400 hover:text-gray-700 hidden"
  >
    <i class="fas fa-times"></i>
  </button>

  <!-- History Dropdown (nempel di bawah input) -->
  <ul
    id="searchHistory"
    class="absolute left-0 right-0 mt-1 bg-white border border-gray-300 rounded-md shadow-md text-gray-700 text-sm hidden z-50"
  ></ul>
</div>

      <table id="dataTable" class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50 text-gray-700 font-semibold">
          <tr>
            <th class="px-4 py-3 text-left">Nama Mahasiswa</th>
            <th class="px-4 py-3 text-left">NIM</th>
            <th class="px-4 py-3 text-left">Universitas</th>
            <th class="px-4 py-3 text-left">Nama Bisnis</th>
            <th class="px-4 py-3 text-left">Kategori</th>
            <th class="px-4 py-3 text-left">Deskripsi</th>
          </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200 text-sm">
          <?php
          foreach ($rows as $row) {
              if (!empty(trim($row))) {
                  $columns = explode("\t", $row);
                  echo "<tr>";
                  foreach ($columns as $column) {
                      echo "<td class='px-4 py-4 text-gray-600'>$column</td>";
                  }
                  echo "</tr>";
              }
          }
          ?>
        </tbody>
      </table>
    </div>
  </main>

  <footer class="text-center py-6 mt-16 text-white-500 text-sm" 
        style="text-align: center; padding: 20px 0; margin-top: 40px; color: #0c0c0cff; font-size: 0.9rem;">
  
  <div style="margin-bottom: 10px;">
      
      <!-- Instagram -->
      <a href="https://www.instagram.com/shoburputra34?igsh=cWI1N3doeXBwbHZr" target="_blank" title="Instagram" 
         style="color: #f40a0aff; text-decoration: none; margin: 0 10px;">
          <i class="fab fa-instagram fa-lg"></i>
      </a>

      <!-- Facebook -->
      <a href="https://www.facebook.com/sobur.302896" target="_blank" title="Facebook" 
         style="color: #2601f3ff; text-decoration: none; margin: 0 10px;">
          <i class="fab fa-facebook-f fa-lg"></i>
      </a>

      <!-- WhatsApp (klik icon telepon untuk buka WA) -->
      <a href="https://wa.me/6281234567890?text=Halo%20saya%20tertarik%20dengan%20program%20Anda!" 
         target="_blank" title="WhatsApp" 
         style="color: #128C7E; text-decoration: none; margin: 0 10px;">
          <i class="fas fa-phone-alt fa-lg"></i>
      </a>

      <!-- Email -->
      <a href="mailto:kelompo66@example.com" title="Email" 
         style="color: #e51616ff; text-decoration: none; margin: 0 10px;">
          <i class="fas fa-envelope fa-lg"></i>
      </a>
  </div>

  &copy; <span id="year"></span> Mahasiswa Prodi SI — Dibuat oleh Kelompok 6
</footer>

  <!-- 🔹 SCRIPT -->
  <script>
  // Tahun otomatis di footer
  document.getElementById("year").textContent = new Date().getFullYear();

  // Inisialisasi DataTable tanpa "Entries per page" dan tanpa search default
  const dataTable = new simpleDatatables.DataTable("#dataTable", {
    perPageSelect: false,
    searchable: false,
    labels: {
      noRows: "Tidak ada data yang ditemukan",
      info: "Menampilkan {start}–{end} dari {rows} data",
    },
  });

  // Elemen-elemen penting
  const searchInput = document.getElementById("customSearch");
  const clearBtn = document.getElementById("clearSearch");
  const historyList = document.getElementById("searchHistory");

  let searchHistory = [];

  // 🔍 Event pencarian real-time
  searchInput.addEventListener("keyup", (e) => {
    const val = e.target.value.trim();
    dataTable.search(val);

    // Tampilkan tombol X jika ada teks
    clearBtn.classList.toggle("hidden", val === "");

    // Jika tekan Enter → simpan ke riwayat
    if (e.key === "Enter" && val !== "") {
      addToHistory(val);
      renderHistory();
    }
  });

  // ❌ Tombol hapus teks
  clearBtn.addEventListener("click", () => {
    searchInput.value = "";
    clearBtn.classList.add("hidden");
    dataTable.search("");
    historyList.classList.add("hidden");
  });

  // 🕓 Tambahkan ke history
  function addToHistory(term) {
    // Hindari duplikat & batasi 5 riwayat terakhir
    searchHistory = [term, ...searchHistory.filter((t) => t !== term)].slice(0, 5);
    localStorage.setItem("searchHistory", JSON.stringify(searchHistory));
  }

  // 🔁 Muat riwayat dari localStorage saat reload
  window.addEventListener("load", () => {
    const saved = localStorage.getItem("searchHistory");
    if (saved) searchHistory = JSON.parse(saved);
  });

  // 🎯 Render history dropdown
  function renderHistory() {
    if (searchHistory.length === 0) {
      historyList.classList.add("hidden");
      return;
    }
    historyList.innerHTML = searchHistory
      .map((item) => `<li class="px-3 py-2 hover:bg-gray-100 cursor-pointer">${item}</li>`)
      .join("");
    historyList.classList.remove("hidden");
  }

  // Klik item history → masukkan ke input
  historyList.addEventListener("click", (e) => {
    if (e.target.tagName === "LI") {
      searchInput.value = e.target.textContent;
      dataTable.search(e.target.textContent);
      historyList.classList.add("hidden");
      clearBtn.classList.remove("hidden");
    }
  });

  // Tutup history saat klik di luar
  document.addEventListener("click", (e) => {
    if (!e.target.closest("#searchHistory") && e.target !== searchInput) {
      historyList.classList.add("hidden");
    }
  });

  // Tampilkan history saat fokus input
  searchInput.addEventListener("focus", () => {
    if (searchHistory.length > 0) renderHistory();
  });
</script>



</body>
</html>
