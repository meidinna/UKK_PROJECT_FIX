<x-app-layout>
    <div class="py-8 bg-gradient-to-br from-green-50 via-white to-teal-50 min-h-screen">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Welcome Card -->
            <div class="mb-8 bg-gradient-to-r from-green-700 to-teal-700 rounded-2xl shadow-xl text-white overflow-hidden">
                <div class="p-8 relative">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-white bg-opacity-10 rounded-full -mr-16 -mt-16"></div>
                    <div class="absolute bottom-0 left-0 w-24 h-24 bg-white bg-opacity-10 rounded-full -ml-12 -mb-12"></div>
                    
                    <div class="relative z-10">
                        <h1 class="text-4xl font-bold mb-2">Selamat Datang! 👋</h1>
                        <p class="text-xl opacity-90">{{ $siswa ? $siswa->nama : 'Siswa' }}</p>
                    </div>
                </div>
            </div>

            @if($siswa)
            <!-- Main Info Cards -->
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-8 mb-8">
                <!-- Profile Photo & Status -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-2xl shadow-lg p-6 text-center hover:shadow-xl transition-all duration-300">
                        <div class="w-32 h-32 mx-auto mb-4 bg-gradient-to-r from-green-600 to-teal-600 rounded-full flex items-center justify-center text-white text-5xl font-bold shadow-lg">
                            {{ substr($siswa->nama, 0, 1) }}
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $siswa->nama }}</h3>
                        <p class="text-gray-600 mb-4">NIS: {{ $siswa->nis }}</p>
                        
                        <!-- Status PKL Badge -->
                        @if($siswa->status_pkl)
                            <span class="inline-flex items-center px-4 py-2 bg-green-100 text-green-800 rounded-full text-sm font-semibold">
                                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"></path>
                                </svg>
                                Aktif PKL
                            </span>
                        @else
                            <span class="inline-flex items-center px-4 py-2 bg-yellow-100 text-yellow-800 rounded-full text-sm font-semibold">
                                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"></path>
                                </svg>
                                Belum PKL
                            </span>
                        @endif
                    </div>

                    <!-- Quick Actions - Moved here and made smaller -->
                    <div class="bg-white rounded-2xl shadow-lg p-4 mt-6 hover:shadow-xl transition-all duration-300">
                        <h4 class="text-lg font-bold text-gray-800 mb-4 text-center">Menu Cepat</h4>
                        <div class="grid grid-cols-2 gap-3">
                            <a href="{{ route('pkl') }}" class="group">
                                <div class="bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 text-white p-3 rounded-lg text-center transition-all duration-300 transform hover:scale-105 shadow-md hover:shadow-lg">
                                    <svg class="w-5 h-5 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                    <p class="text-xs font-semibold">PKL</p>
                                </div>
                            </a>

                            <a href="{{ route('siswa') }}" class="group">
                                <div class="bg-gradient-to-r from-teal-500 to-teal-600 hover:from-teal-600 hover:to-teal-700 text-white p-3 rounded-lg text-center transition-all duration-300 transform hover:scale-105 shadow-md hover:shadow-lg">
                                    <svg class="w-5 h-5 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                                    </svg>
                                    <p class="text-xs font-semibold">Siswa</p>
                                </div>
                            </a>

                            <a href="{{ route('industri') }}" class="group">
                                <div class="bg-gradient-to-r from-emerald-500 to-emerald-600 hover:from-emerald-600 hover:to-emerald-700 text-white p-3 rounded-lg text-center transition-all duration-300 transform hover:scale-105 shadow-md hover:shadow-lg">
                                    <svg class="w-5 h-5 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                    </svg>
                                    <p class="text-xs font-semibold">Industri</p>
                                </div>
                            </a>

                            <a href="{{ route('guru') }}" class="group">
                                <div class="bg-gradient-to-r from-green-700 to-teal-700 hover:from-green-800 hover:to-teal-800 text-white p-3 rounded-lg text-center transition-all duration-300 transform hover:scale-105 shadow-md hover:shadow-lg">
                                    <svg class="w-5 h-5 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                    <p class="text-xs font-semibold">Guru</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Main Info Cards -->
                <div class="lg:col-span-3 space-y-6">
                    <!-- Personal Info Section -->
                    <div class="bg-white rounded-2xl shadow-lg p-6 hover:shadow-xl transition-all duration-300">
                        <div class="flex items-center mb-6">
                            <div class="bg-green-100 p-3 rounded-full mr-4">
                                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                            <h3 class="text-2xl font-bold text-gray-800">Informasi Personal</h3>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <!-- Gender -->
                            <div class="group">
                                <div class="bg-gradient-to-r from-green-50 to-teal-50 p-4 rounded-xl border-l-4 border-green-400 hover:border-green-500 transition-all duration-300 hover:shadow-md">
                                    <label class="block text-sm font-semibold text-green-600 mb-1">Jenis Kelamin</label>
                                    <p class="text-lg font-bold text-gray-800">
                                        {{ $siswa->gender == 'L' ? 'Laki-laki' : 'Perempuan' }}
                                    </p>
                                </div>
                            </div>

                            <!-- Rombel -->
                            <div class="group">
                                <div class="bg-gradient-to-r from-teal-50 to-emerald-50 p-4 rounded-xl border-l-4 border-teal-400 hover:border-teal-500 transition-all duration-300 hover:shadow-md">
                                    <label class="block text-sm font-semibold text-teal-600 mb-1">Rombongan Belajar</label>
                                    <p class="text-lg font-bold text-gray-800 uppercase">{{ $siswa->rombel }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Contact Info Section -->
                    <div class="bg-white rounded-2xl shadow-lg p-6 hover:shadow-xl transition-all duration-300">
                        <div class="flex items-center mb-6">
                            <div class="bg-teal-100 p-3 rounded-full mr-4">
                                <svg class="w-6 h-6 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <h3 class="text-2xl font-bold text-gray-800">Informasi Kontak</h3>
                        </div>

                        <div class="space-y-4">
                            <!-- Email -->
                            <div class="bg-gradient-to-r from-green-50 to-teal-50 p-4 rounded-xl border-l-4 border-green-400 hover:border-green-500 transition-all duration-300 hover:shadow-md">
                                <label class="block text-sm font-semibold text-green-600 mb-1">Email</label>
                                <p class="text-lg font-bold text-gray-800">{{ $siswa->email }}</p>
                            </div>

                            <!-- Phone -->
                            <div class="bg-gradient-to-r from-teal-50 to-green-50 p-4 rounded-xl border-l-4 border-teal-400 hover:border-teal-500 transition-all duration-300 hover:shadow-md">
                                <label class="block text-sm font-semibold text-teal-600 mb-1">Kontak</label>
                                <p class="text-lg font-bold text-gray-800">{{ $siswa->kontak }}</p>
                            </div>

                            <!-- Address -->
                            <div class="bg-gradient-to-r from-emerald-50 to-green-50 p-4 rounded-xl border-l-4 border-emerald-400 hover:border-emerald-500 transition-all duration-300 hover:shadow-md">
                                <label class="block text-sm font-semibold text-emerald-600 mb-1">Alamat</label>
                                <p class="text-lg font-bold text-gray-800">{{ $siswa->alamat }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @else
            <!-- No Data Message -->
            <div class="bg-white rounded-2xl shadow-lg p-8 text-center">
                <div class="w-24 h-24 mx-auto mb-4 bg-gray-200 rounded-full flex items-center justify-center">
                    <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">Data Siswa Tidak Ditemukan</h3>
                <p class="text-gray-600">Silakan hubungi administrator untuk menambahkan data siswa.</p>
            </div>
            @endif
        </div>
    </div>

    <style>
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .animate-fade-in-up {
            animation: fadeInUp 0.6s ease-out;
        }
    </style>
</x-app-layout>