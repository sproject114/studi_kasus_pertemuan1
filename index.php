  <!DOCTYPE html>
  <html lang="id">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda</title>
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Tambahkan ini di <head> -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  </head>

  <body class="bg-black-900 text-gray-800">

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
        <li><a href="index.php" class="text-black text-white  px-4 py-2 rounded-lg transition duration-300">Home</a></li>
        <li><a href="database_ide.php" class="text-black hover:text-white  px-4 py-2 rounded-lg transition duration-300">Database</a></li>
        <li><a href="infografis.php" class="text-black hover:text-white  px-4 py-2 rounded-lg transition duration-300">State</a></li>
      </ul>
      
      <a href="daftarkan_ide.php" class="text-white bg-[#d96600] px-4 py-2 rounded-lg shadow-md hover:bg-[#b35400] transition duration-300">
        Try Out
      </a>
    </div>
  </nav>

    <!-- 🔹 HERO SECTION -->
    <section class="bg-gradient-to-r from-gray-800 to-gray-400 min-h-[90vh] flex items-center justify-between text-left pt-32 px-16 rounded-2xl shadow-[0_10px_40px_rgba(0,0,0,0.4)] mt-1">
      <div>
        <h2 class="text-5xl font-bold text-white mb-4 leading-snug">
      Wujudkan Ide <br>
    <span class="text-[#d96600] italic text-7xl drop-shadow-lg">Bisnismu</span> Sekarang
  </h2>

        </a>
      </div>
    </section>

    <!-- 🔹 FOOTER SECTION-->
    <section class="bg-gradient-to-r from-gray-400 to-gray-800 min-h-[60vh] flex items-start justify-between text-left pt-32 px-16 rounded-2xl 
    transform transition duration-100 
    hover:scale-105 hover:-translate-y-2 hover:shadow-[0_15px_60px_rgba(0,0,0,0.6)] shadow-[0_10px_40px_rgba(0,0,0,0.4)]">
    <h3 class="text-4xl font-bold text-white mb-4 leading-snug">
      <div class ="text-4xl drop-shadow-lg font-Poppins">
      Platform
      <span class="text-[#d96600] font-poppins text-5xl drop-shadow-lg"> kolaboratif</span> untuk <br> mahasiswa Indonesia yang ingin memulai,<br>
      mengembangkan,<br>
      dan memvalidasi ide bisnis <span  class="text-[#d96600] font-poppins text-5xl drop-shadow-lg">inovatif</span>
      </div>
    </h3>
  </section>

  <section class="bg-gradient-to-r from-gray-900 via-gray-400 to-white min-h-[60vh] flex items-center justify-start px-16 rounded-2xl transform transition duration-100 
    hover:scale-105 hover:-translate-y-2 hover:shadow-[0_15px_60px_rgba(0,0,0,0.6)]" >
    <div class="relative flex items-center">
      
      <!-- Kotak kiri (geser sedikit ke kanan) -->
  <!-- Teks -->
      <h3 class="text-white text-5xl font-bold italic leading-snug ml-10">
        <span class="relative z-10 text-gray-700" style="position: relative; left: 750px;"> feel the  new</span><br>
        <span class="relative z-10 text-gray-700" style="position: relative; left: 750px;">experienced<br></span>
        <span class="relative z-10 text-gray-700" style="position: relative; left: 750px;">in your hands</span>
      </h3>
    </div>
  </section>

  <section class="bg-gradient-to-r from-gray-400 to-gray-800 min-h-[60vh] flex items-start justify-between text-left pt-32 px-16 rounded-2xl 
    transform transition duration-100 
    hover:scale-105 hover:-translate-y-2 hover:shadow-[0_15px_60px_rgba(0,0,0,0.6)] shadow-[0_10px_40px_rgba(0,0,0,0.4)]">
    <h3 class="text-4xl font-bold text-white mb-4 leading-snug">
      <div class ="text-4xl drop-shadow-lg font-Poppins">
      <span class="text-[#d96600] font-poppins text-5xl drop-shadow-lg"> Validasi ide </span><br> Daftarkan idemu dan dapatkan umpan baik dari komunitas untuk memvalidasi konsep bisnimu.<br>
      <br> 
      </div>
    </h3>
  </section>
  <section class="bg-gradient-to-r from-gray-400 to-gray-800 min-h-[60vh] flex items-start justify-between text-left pt-32 px-16 rounded-2xl 
  transform transition duration-100 
    hover:scale-105 hover:-translate-y-2 hover:shadow-[0_15px_60px_rgba(0,0,0,0.6)] shadow-[0_10px_40px_rgba(0,0,0,0.4)]">
    <h3 class="text-4xl font-bold text-white mb-4 leading-snug">
      <div class ="text-4xl drop-shadow-lg font-Poppins">
      <span class="text-[#d96600] font-poppins text-5xl drop-shadow-lg"> Jaringan & Kolaborasi </span><br>Temukan rekan tim atau mentor dari database ide bisni yang terkumpul dari berbagai universitas.<br>
      <br> 
      </div>
    </h3>
  </section>

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

  <script>
      document.getElementById('year').textContent = new Date().getFullYear();
  </script>

    <!-- 🔹 SCRIPT -->
    <script>
      // Navbar aktif (klik -> putih)
      const links = document.querySelectorAll('.nav-link');
      links.forEach(link => {
        link.addEventListener('click', () => {
          links.forEach(l => l.classList.remove('text-white'));
          links.forEach(l => l.classList.add('text-black'));
          link.classList.remove('text-black');
          link.classList.add('text-white');
        });
      });

      // Tahun otomatis di footer
      document.getElementById('year').textContent = new Date().getFullYear();
    </script>

  </body>
  </html>
