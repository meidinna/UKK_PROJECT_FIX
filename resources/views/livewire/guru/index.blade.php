<div class="container mx-auto px-4 py-6 bg-gradient-to-br from-green-50 to-green-100 min-h-screen">
    <!-- Header and Filters -->
    <div class="mb-8">
        <div class="bg-gradient-to-r from-green-800 to-green-700 rounded-2xl p-6 shadow-lg mb-6">
            <h1 class="text-3xl font-bold text-white mb-2 flex items-center">
                <svg class="w-8 h-8 mr-3" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3z"/>
                </svg>
                Data Guru
            </h1>
            <p class="text-green-100">Kelola informasi guru dengan mudah</p>
        </div>

        <!-- Gender Filter -->
        <div class="bg-white/80 backdrop-blur-sm rounded-xl p-4 shadow-md border border-green-200">
            <h3 class="text-sm font-semibold text-green-800 mb-3 uppercase tracking-wide">Filter Gender</h3>
            <div class="flex flex-wrap gap-3">
                <button wire:click="$set('genderFilter', '')" 
                        class="{{ !$genderFilter ? 'bg-green-700 text-white shadow-lg transform scale-105' : 'bg-green-100 text-green-700 hover:bg-green-200' }} px-6 py-2.5 rounded-full font-medium transition-all duration-200 border border-green-300">
                    <span class="flex items-center">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M3 3a1 1 0 000 2v8a2 2 0 002 2h2.586l-1.293 1.293a1 1 0 101.414 1.414L10 15.414l2.293 2.293a1 1 0 001.414-1.414L12.414 15H15a2 2 0 002-2V5a1 1 0 100-2H3zm11.707 4.707a1 1 0 00-1.414-1.414L10 9.586 8.707 8.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        Semua
                    </span>
                </button>
                <button wire:click="$set('genderFilter', 'L')" 
                        class="{{ $genderFilter === 'L' ? 'bg-green-700 text-white shadow-lg transform scale-105' : 'bg-green-100 text-green-700 hover:bg-green-200' }} px-6 py-2.5 rounded-full font-medium transition-all duration-200 border border-green-300">
                    <span class="flex items-center">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                        </svg>
                        Laki-Laki
                    </span>
                </button>
                <button wire:click="$set('genderFilter', 'P')" 
                        class="{{ $genderFilter === 'P' ? 'bg-green-700 text-white shadow-lg transform scale-105' : 'bg-green-100 text-green-700 hover:bg-green-200' }} px-6 py-2.5 rounded-full font-medium transition-all duration-200 border border-green-300">
                    <span class="flex items-center">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                        </svg>
                        Perempuan
                    </span>
                </button>
            </div>
        </div>
    </div>

    <!-- Table Section -->
    <div class="bg-white/90 backdrop-blur-sm shadow-xl rounded-2xl overflow-hidden border border-green-200">
        <div class="bg-gradient-to-r from-green-700 to-green-600 p-4">
            <h2 class="text-lg font-semibold text-white flex items-center">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M5 4a3 3 0 00-3 3v6a3 3 0 003 3h10a3 3 0 003-3V7a3 3 0 00-3-3H5zm-1 9v-1h5v2H5a1 1 0 01-1-1zm7 1h4a1 1 0 001-1v-1h-5v2zm0-4h5V8h-5v2zM9 8H4v2h5V8z" clip-rule="evenodd"/>
                </svg>
                Daftar Guru
            </h2>
        </div>
        
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left">
                <thead class="text-xs text-green-800 uppercase bg-gradient-to-r from-green-100 to-green-50 border-b-2 border-green-200">
                    <tr>
                        <th class="px-6 py-4 font-bold">
                            <div class="flex items-center">
                                <span class="bg-green-200 text-green-800 px-2 py-1 rounded-full text-xs mr-2">#</span>
                                No
                            </div>
                        </th>
                        <th class="px-6 py-4 font-bold">
                            <div class="flex items-center">
                                <svg class="w-4 h-4 mr-2 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                                </svg>
                                Nama
                            </div>
                        </th>
                        <th class="px-6 py-4 font-bold">
                            <div class="flex items-center">
                                <svg class="w-4 h-4 mr-2 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v8a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2H4zm0 2h12v8H4V6z" clip-rule="evenodd"/>
                                </svg>
                                NIP
                            </div>
                        </th>
                        <th class="px-6 py-4 font-bold">
                            <div class="flex items-center">
                                <svg class="w-4 h-4 mr-2 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3z"/>
                                </svg>
                                Gender
                            </div>
                        </th>
                        <th class="px-6 py-4 font-bold">
                            <div class="flex items-center">
                                <svg class="w-4 h-4 mr-2 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                                </svg>
                                Alamat
                            </div>
                        </th>
                        <th class="px-6 py-4 font-bold">
                            <div class="flex items-center">
                                <svg class="w-4 h-4 mr-2 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/>
                                </svg>
                                Kontak
                            </div>
                        </th>
                        <th class="px-6 py-4 font-bold">
                            <div class="flex items-center">
                                <svg class="w-4 h-4 mr-2 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                                    <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
                                </svg>
                                Email
                            </div>
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-green-100">
                    @forelse ($gurus as $index => $guru)
                        <tr class="bg-white hover:bg-green-50 transition-all duration-200 group">
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    <span class="bg-gradient-to-r from-green-600 to-green-700 text-white px-3 py-1 rounded-full text-xs font-bold shadow-sm">
                                        {{ $index + 1 }}
                                    </span>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="font-semibold text-green-900 group-hover:text-green-700">
                                    {{ $guru->nama }}
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="bg-green-100 text-green-800 px-3 py-1 rounded-lg text-sm font-mono">
                                    {{ $guru->nip }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                @if($guru->gender === 'L')
                                    <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-xs font-semibold flex items-center w-fit">
                                        <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                                        </svg>
                                        Laki-Laki
                                    </span>
                                @elseif($guru->gender === 'P')
                                    <span class="bg-pink-100 text-pink-800 px-3 py-1 rounded-full text-xs font-semibold flex items-center w-fit">
                                        <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                                        </svg>
                                        Perempuan
                                    </span>
                                @else
                                    <span class="bg-gray-100 text-gray-800 px-3 py-1 rounded-full text-xs font-semibold">
                                        {{ $guru->gender }}
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-gray-700 text-sm flex items-start">
                                    <svg class="w-4 h-4 mr-2 text-green-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                                    </svg>
                                    <span class="break-words">{{ $guru->alamat }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <a href="tel:{{ $guru->kontak }}" class="text-green-700 hover:text-green-900 font-medium flex items-center group">
                                    <svg class="w-4 h-4 mr-2 group-hover:scale-110 transition-transform" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/>
                                    </svg>
                                    {{ $guru->kontak }}
                                </a>
                            </td>
                            <td class="px-6 py-4">
                                <a href="mailto:{{ $guru->email }}" class="text-green-700 hover:text-green-900 font-medium flex items-center group">
                                    <svg class="w-4 h-4 mr-2 group-hover:scale-110 transition-transform" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                                        <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
                                    </svg>
                                    <span class="break-all">{{ $guru->email }}</span>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-6 py-12 text-center">
                                <div class="flex flex-col items-center justify-center space-y-4">
                                    <div class="bg-green-100 p-4 rounded-full">
                                        <svg class="w-12 h-12 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m3 4.197a4 4 0 11-8 0 4 4 0 018 0z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="text-lg font-semibold text-gray-900 mb-2">
                                            @if($genderFilter)
                                                Tidak Ada Data Guru
                                            @else
                                                Belum Ada Data Guru
                                            @endif
                                        </h3>
                                        <p class="text-gray-600">
                                            @if($genderFilter)
                                                Tidak ditemukan guru dengan filter gender yang dipilih.
                                            @else
                                                Tidak ada data guru yang ditemukan.
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>