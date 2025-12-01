<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dasbor Tren Bisnis Mahasiswa</title>

  <!-- Tailwind & Font Awesome -->
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <!-- Leaflet & Highcharts -->
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
  <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
  <script src="https://code.highcharts.com/highcharts.js"></script>
  <script src="https://code.highcharts.com/modules/exporting.js"></script>

  <style>
    #mapid { height: 460px; }
  </style>
</head>

<body class="bg-gradient-to-b from-gray-900 via-gray-700 to-gray-100 font-sans text-gray-900">

  <!-- 🔹 NAVBAR -->
  <nav class="fixed top-0 left-0 w-full 
              bg-gradient-to-r from-gray-300/85 via-gray-400/80 to-gray-500/75 
              backdrop-blur-md shadow-md py-4 px-10 flex justify-between items-center 
              rounded-b-xl z-50 border-b border-gray-300/30 transition-all duration-300">
    <h1 class="text-2xl font-bold text-black drop-shadow-sm tracking-wide select-none">
      UMKM DIGITAL HUB
    </h1>

    <ul class="flex space-x-8 font-semibold italic">
      <li><a href="index.php" class="text-black hover:text-white px-4 py-2 rounded-lg transition">Home</a></li>
      <li><a href="database_ide.php" class="text-black hover:text-white px-4 py-2 rounded-lg transition">Database</a></li>
      <li><a href="infografis.php" class="text-black text-white px-4 py-2 rounded-lg transition">State</a></li>
    </ul>
  </nav>

  <!-- 🔹 HEADER -->
  <header class="pt-28 mb-10 text-center">
    <h1 class="text-4xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-gray-100 via-gray-300 to-white drop-shadow-lg">
      Tren Bisnis Mahasiswa
    </h1>
  </header>

  <!-- 🔹 MAIN CONTENT -->
  <main class="max-w-7xl mx-auto pb-10 px-4 sm:px-6 lg:px-8 mt-4">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

      <!-- 📊 Grafik -->
      <div class="bg-white shadow-lg rounded-2xl p-6 text-center">
        <h2 class="text-xl font-semibold text-gray-900 mb-2">Top 5 Kategori Bisnis Mahasiswa 2025</h2>
        <h3 class="text-base font-medium text-gray-700 mb-6">Popularitas Kategori Bisnis</h3>

        <div id="chart-bar" class="w-full h-96 transition-all duration-500 ease-in-out"></div>

        <!-- 🔵 Badge toggle grafik -->
        <div class="mt-4 text-center">
          <button id="toggleChart"
            class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium 
                   bg-blue-100 text-blue-800 hover:bg-blue-200 transition">
            <span class="w-2 h-2 mr-2 rounded-full bg-blue-500"></span>
            <span id="toggleText">Tahun 2025</span>
          </button>
        </div>
      </div>

      <!-- 🗺️ Peta -->
      <div class="bg-white shadow-lg rounded-2xl p-6 sticky top-28 self-start">
        <h2 class="text-xl font-semibold text-gray-900 mb-4">Peta Sebaran Startup Mahasiswa</h2>
        <div id="mapid" class="rounded-lg overflow-hidden"></div>
      </div>
    </div>
  </main>

  <!-- 🔹 FOOTER -->
  <footer class="text-center py-6 mt-16 text-white-500 text-sm" 
        style="text-align: center; padding: 20px 0; color: #0c0c0cff; font-size: 0.9rem;">
    <div style="margin-bottom: 10px;">
      <a href="https://www.instagram.com/shoburputra34?igsh=cWI1N3doeXBwbHZr" target="_blank" title="Instagram" style="color:#f40a0a; margin:0 10px;">
        <i class="fab fa-instagram fa-lg"></i>
      </a>
      <a href="https://www.facebook.com/sobur.302896" target="_blank" title="Facebook" style="color:#2601f3; margin:0 10px;">
        <i class="fab fa-facebook-f fa-lg"></i>
      </a>
      <a href="https://wa.me/6281234567890?text=Halo%20saya%20tertarik%20dengan%20program%20Anda!" target="_blank" title="WhatsApp" style="color:#128C7E; margin:0 10px;">
        <i class="fas fa-phone-alt fa-lg"></i>
      </a>
      <a href="mailto:kelompo66@example.com" title="Email" style="color:#e51616; margin:0 10px;">
        <i class="fas fa-envelope fa-lg"></i>
      </a>
    </div>
    &copy; <span id="year"></span> Mahasiswa Prodi SI — Dibuat oleh Kelompok 6
  </footer>

  <!-- 🔹 SCRIPT -->
  <script>
    // Tahun otomatis
    document.getElementById('year').textContent = new Date().getFullYear();

    // Highcharts: Grafik Bar
    Highcharts.chart('chart-bar', {
      chart: { type: 'bar', backgroundColor: 'transparent' },
      title: { text: null },
      xAxis: { 
        categories: ['F&B', 'Jasa Digital', 'Fashion', 'Pendidikan', 'Kreatif'],
        labels: { style: { color: '#111', fontWeight: 'bold' } }
      },
      yAxis: {
        min: 0,
        title: { text: 'Jumlah Peminat', style: { color: '#333' } }
      },
      legend: { enabled: false },
      series: [{
        name: 'Jumlah',
        data: [107, 81, 68, 52, 41],
        color: '#3b82f6'
      }]
    });

    // Tombol untuk sembunyikan / tampilkan grafik
    const toggleBtn = document.getElementById("toggleChart");
    const chartBar = document.getElementById("chart-bar");
    const toggleText = document.getElementById("toggleText");
    let chartVisible = true;

    toggleBtn.addEventListener("click", () => {
      chartVisible = !chartVisible;
      if (chartVisible) {
        chartBar.style.height = "24rem";
        chartBar.style.opacity = "1";
        toggleText.textContent = "Tahun 2025";
      } else {
        chartBar.style.height = "0";
        chartBar.style.opacity = "0";
        toggleText.textContent = "Tampilkan Grafik";
      }
    });

    // Leaflet Map
    var map = L.map('mapid').setView([-6.9269381, 107.6260829], 17);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: '&copy; OpenStreetMap contributors'
    }).addTo(map);
    L.marker([-6.9269381, 107.6260829]).addTo(map)
      .bindPopup('<b>Universitas Kebangsaan Republik Indonesia (UKRI)</b><br>Bandung')
      .openPopup();
  </script>

</body>
</html>
