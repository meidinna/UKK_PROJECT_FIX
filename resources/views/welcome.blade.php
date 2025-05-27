<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>APL PKL SIJA</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    .fade-in {
      animation: fadeIn 1s ease-in-out both;
    }
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }
  </style>
</head>
<body class="bg-[#F6F7EF] text-gray-800">

<!-- Hero Section -->
<section class="relative min-h-screen flex items-center justify-center px-6 bg-gradient-to-br from-[#2E7D65] via-[#4C9A7E] to-[#1F5A4A] overflow-hidden">

  <!-- Decorative Elements -->
  <div class="absolute -top-20 -left-32 w-[400px] h-[400px] bg-yellow-300/20 rounded-full blur-3xl mix-blend-lighten"></div>
  <div class="absolute -bottom-20 -right-28 w-[300px] h-[300px] bg-green-100/30 rounded-full blur-2xl mix-blend-lighten"></div>

  <!-- Glass Content Box -->
  <div class="fade-in z-10 bg-white/20 backdrop-blur-lg p-10 rounded-3xl max-w-2xl w-full text-center shadow-2xl border border-white/30">
    <h1 class="text-5xl font-extrabold text-white mb-4 drop-shadow-xl">Aplikasi PKL SIJA</h1>
    <p class="text-lg text-green-100 mb-8 font-medium">Sistem Informasi Praktik Kerja Lapangan untuk siswa jurusan SIJA</p>
    
    <div class="flex flex-col md:flex-row justify-center items-center gap-4">
      <a href="/login"
         class="px-8 py-3 text-white bg-[#2E7D65] hover:bg-[#1F5A4A] rounded-full text-lg font-semibold shadow-md hover:shadow-lg transition-all duration-300">
         Login
      </a>
      <a href="/register"
         class="px-8 py-3 text-[#2E7D65] bg-yellow-300 hover:bg-yellow-400 rounded-full text-lg font-semibold shadow-md hover:shadow-lg transition-all duration-300">
         Register
      </a>
    </div>
  </div>

</section>

</body>
</html>
