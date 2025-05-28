<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>NadimDesk Dashboard</title>
  <link rel="stylesheet" href="{{ asset('css/styles.css')}}" />
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="relative bg-gray-100 min-h-screen overflow-x-hidden">

  <!-- Background Image -->
  <div class="absolute inset-0 -z-10">
    <img src="BandaraHangNadimBatam.jpeg" alt="Hang Nadim Batam" class="w-full h-full object-cover blur-sm brightness-75">
  </div>

  <!-- Navbar -->
  <!-- Navbar -->
  <nav class="bg-sky-500 bg-opacity-90 text-white px-6 py-4 flex justify-between items-center shadow-md">
    <div class="text-xl font-bold">Helpdesk Bandara Hang Nadim</div>
    <button id="menu-toggle" class="md:hidden text-white text-xl focus:outline-none">☰</button>
    <ul class="hidden md:flex space-x-6 font-medium">
      <li><a href="#" class="hover:underline">Dashboard</a></li>
      <li><a href="#" class="hover:underline">Pelacakan Status</a></li>
      <li><a href="#" class="hover:underline">Penilaian</a></li>
    </ul>
  </nav>

  <!-- Mobile Menu -->
  <div id="mobile-menu" class="md:hidden hidden bg-white bg-opacity-90 shadow px-6 py-4">
    <ul class="space-y-3 text-gray-700 font-medium">
      <li><a href="#" class="block hover:text-blue-600">Dashboard</a></li>
      <li><a href="#" class="block hover:text-blue-600">Pelacakan Status</a></li>
      <li><a href="#" class="block hover:text-blue-600">Penilaian</a></li>
    </ul>
  </div>

  <!-- Main Content -->
  <main class="p-6">
    <h1 class="text-3xl font-bold text-white mb-4 drop-shadow">Selamat Datang di NadimDesk</h1>
    <p class="mb-6 text-white drop-shadow">Silakan pilih menu di atas untuk melanjutkan.</p>

    <!-- Lacak Aduan Box -->
    <section class="max-w-md mx-auto mt-10 bg-white bg-opacity-95 p-6 rounded-lg shadow-lg backdrop-blur-sm">
      <h2 class="text-lg font-semibold underline mb-4 text-gray-800">Lacak Aduan</h2>

      <div class="space-y-3 text-gray-700">
        <div class="flex justify-between">
          <span>No Tiket</span><span>:</span>
        </div>
        <div class="flex justify-between">
          <span>Nama</span><span>:</span>
        </div>
        <div class="flex justify-between">
          <span>Tanggal Dibuat</span><span>:</span>
        </div>
        <div class="flex justify-between">
          <span>Kategori Keluhan</span><span>:</span>
        </div>
        <div class="flex justify-between">
          <span>Status</span><span>:</span>
        </div>
        <div class="flex justify-between">
          <span>Bukti Penyelesaian</span><span>:</span>
        </div>
      </div>

      <div class="mt-6 text-center">
        <button class="bg-sky-500 hover:bg-sky-600 text-white px-6 py-2 rounded-md font-semibold">
          Kembali
        </button>
      </div>
    </section>
  </main>

  <script>
    document.getElementById("menu-toggle").addEventListener("click", function () {
      const menu = document.getElementById("mobile-menu");
      menu.classList.toggle("hidden");
    });
  </script>

</body>
</html>
