@extends('layout.app')

<body class="relative min-h-screen overflow-x-hidden">

  <!-- Background -->
  <div class="absolute inset-0 -z-10">
    <img src="images/hangnadim.png" alt="Bandara Hang Nadim" class="w-full h-full object-cover blur-sm brightness-75">
  </div>

  <!-- Navbar -->
  <nav class="bg-sky-500 bg-opacity-90 text-white px-6 py-4 flex justify-between items-center shadow-md">
    <div class="text-xl font-bold">Helpdesk Bandara Hang Nadim</div>
    <button id="menu-toggle" class="md:hidden text-white text-xl focus:outline-none">☰</button>
    <ul class="hidden md:flex space-x-6 font-medium">
      <li><a href="{{ route('home') }}" class="hover:underline">Dashboard</a></li>
      <li><a href="{{ route('tracking') }}" class="hover:underline">Pelacakan Status</a></li>
    </ul>
  </nav>

  <!-- Mobile Menu -->p
  <div id="mobile-menu" class="md:hidden hidden bg-white bg-opacity-90 shadow px-6 py-4">
    <ul class="space-y-3 text-gray-800 font-medium">
      <li><a href="{{ route('home') }}" class="block hover:text-sky-600">Dashboard</a></li>
      <li><a href="#" class="block hover:text-sky-600">Pelacakan Status</a></li>
      <li><a href="#" class="block hover:text-sky-600">Penilaian</a></li>
    </ul>
  </div>

  <!-- Main Section -->
  <main class="flex flex-col items-center justify-center text-center px-4 py-10">

    <h1 class="text-xl md:text-2xl font-semibold text-white mb-6 drop-shadow">Silahkan Ketik nomor tiket untuk melacak status!</h1>

    <!-- Search Form -->
    <div class="relative max-w-md w-full mb-8">
      <input type="text" placeholder="Masukkan no tiket" class="w-full py-3 pl-5 pr-12 rounded-full border border-gray-300 focus:outline-none shadow-md" />
      <button class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-600 hover:text-sky-600">
        🔍
      </button>
    </div>

    <!-- Illustration Image -->
    <img src="images/search-illustration.png" alt="Ilustrasi Pencarian" class="max-w-xs md:max-w-md" />
  </main>

  <script>
    document.getElementById("menu-toggle").addEventListener("click", function () {
      document.getElementById("mobile-menu").classList.toggle("hidden");
    });
  </script>

</body>
</html>
