<div>
    <div class="min-h-screen flex flex-col bg-gradient-to-br from-green-50 to-green-100 text-gray-800">
        <!-- Header -->
        <div class="bg-gradient-to-r from-green-800 to-green-700 text-white p-6 shadow-lg">
            <div class="flex justify-between items-center">
                <h1 class="text-2xl font-bold flex items-center">
                    <svg class="w-8 h-8 mr-3" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z"/>
                    </svg>
                    Dashboard Siswa
                </h1>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-grow overflow-auto p-6">
            <div class="bg-white/90 backdrop-blur-sm shadow-xl rounded-2xl p-6 border border-green-200">
                <!-- Filters & Search -->
                <div class="flex flex-wrap justify-between items-center mb-6">
                    <div class="flex gap-4 flex-wrap">
                        <div class="relative">
                            <select wire:model.live="selected_gender" class="appearance-none border border-green-300 bg-green-50 hover:bg-green-100 rounded-xl px-4 py-3 pr-10 text-sm w-44 font-medium text-green-800 focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all duration-200">
                                <option value="">Semua Gender</option>
                                @foreach($genders as $key => $gender)
                                    <option value="{{ $key }}">{{ $gender }}</option>
                                @endforeach
                            </select>
                            <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                                <svg class="w-4 h-4 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                        </div>

                        <div class="relative">
                            <select wire:model.live="selected_rombel" class="appearance-none border border-green-300 bg-green-50 hover:bg-green-100 rounded-xl px-4 py-3 pr-10 text-sm w-44 font-medium text-green-800 focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all duration-200">
                                <option value="">Semua Rombel</option>
                                @foreach($rombels as $key => $rombel)
                                    <option value="{{ $key }}">{{ $rombel }}</option>
                                @endforeach
                            </select>
                            <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                                <svg class="w-4 h-4 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                        </div>

                        <div class="relative">
                            <select wire:model.live="selected_abjad" class="appearance-none border border-green-300 bg-green-50 hover:bg-green-100 rounded-xl px-4 py-3 pr-10 text-sm w-44 font-medium text-green-800 focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all duration-200">
                                <option value="">Urutkan</option>
                                <option value="A-Z">A-Z</option>
                                <option value="Z-A">Z-A</option>
                            </select>
                            <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                                <svg class="w-4 h-4 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                        </div>

                        <button wire:click="resetFilters" class="bg-green-200 hover:bg-green-300 text-green-800 text-sm px-6 py-3 rounded-xl font-medium transition-all duration-200 flex items-center shadow-sm hover:shadow-md transform hover:scale-105">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M4 2a1 1 0 011 1v2.101a7.002 7.002 0 0111.601 2.566 1 1 0 11-1.885.666A5.002 5.002 0 005.999 7H9a1 1 0 010 2H4a1 1 0 01-1-1V3a1 1 0 011-1zm.008 9.057a1 1 0 011.276.61A5.002 5.002 0 0014.001 13H11a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0v-2.101a7.002 7.002 0 01-11.601-2.566 1 1 0 01.61-1.276z" clip-rule="evenodd"/>
                            </svg>
                            Reset
                        </button>
                    </div>

                    <!-- Search Input -->
                    <div class="relative mt-4 sm:mt-0">
                        <input type="text" wire:model.live="search" placeholder="Type here to search..."
                            class="border border-green-300 bg-green-50 rounded-xl px-4 py-3 pr-12 text-sm w-64 font-medium text-green-800 placeholder-green-500 focus:ring-2 focus:ring-green-500 focus:border-green-500 focus:bg-white transition-all duration-200">
                        <span class="absolute right-4 top-1/2 -translate-y-1/2 text-green-500">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"/>
                            </svg>
                        </span>
                    </div>
                </div>

                <!-- Table -->
                <div class="overflow-x-auto rounded-xl border border-green-200">
                    <table class="min-w-full text-sm table-auto">
                        <thead class="bg-gradient-to-r from-green-700 to-green-600 sticky top-0 z-10">
                            <tr>
                                <th class="p-4 text-white font-bold text-left">
                                    <div class="flex items-center">
                                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v8a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2H4zm0 2h12v8H4V6z" clip-rule="evenodd"/>
                                        </svg>
                                        NIS
                                    </div>
                                </th>
                                <th class="p-4 text-white font-bold text-left">
                                    <div class="flex items-center">
                                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                                        </svg>
                                        Nama
                                    </div>
                                </th>
                                <th class="p-4 text-white font-bold text-left">
                                    <div class="flex items-center">
                                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3z"/>
                                        </svg>
                                        Gender
                                    </div>
                                </th>
                                <th class="p-4 text-white font-bold text-left">
                                    <div class="flex items-center">
                                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3z"/>
                                        </svg>
                                        Rombel
                                    </div>
                                </th>
                                <th class="p-4 text-white font-bold text-left">
                                    <div class="flex items-center">
                                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                                        </svg>
                                        Alamat
                                    </div>
                                </th>
                                <th class="p-4 text-white font-bold text-left">
                                    <div class="flex items-center">
                                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/>
                                        </svg>
                                        Kontak
                                    </div>
                                </th>
                                <th class="p-4 text-white font-bold text-left">
                                    <div class="flex items-center">
                                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                                            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
                                        </svg>
                                        Email
                                    </div>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-green-100 bg-white">
                            @forelse($siswas as $siswa)
                                <tr class="hover:bg-green-50 transition-all duration-200 group">
                                    <td class="p-4 border-l-4 border-transparent group-hover:border-green-400">
                                        <span class="bg-green-100 text-green-800 px-3 py-1 rounded-lg text-sm font-mono font-semibold">
                                            {{ $siswa->nis }}
                                        </span>
                                    </td>
                                    <td class="p-4">
                                        <div class="font-semibold text-green-900 group-hover:text-green-700">
                                            {{ $siswa->nama }}
                                        </div>
                                    </td>
                                    <td class="p-4">
                                        @if(isset($genders[$siswa->gender]))
                                            @if($siswa->gender === 'L' || $genders[$siswa->gender] === 'Laki-Laki')
                                                <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-xs font-semibold flex items-center w-fit">
                                                    <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                                                    </svg>
                                                    {{ $genders[$siswa->gender] }}
                                                </span>
                                            @elseif($siswa->gender === 'P' || $genders[$siswa->gender] === 'Perempuan')
                                                <span class="bg-pink-100 text-pink-800 px-3 py-1 rounded-full text-xs font-semibold flex items-center w-fit">
                                                    <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                                                    </svg>
                                                    {{ $genders[$siswa->gender] }}
                                                </span>
                                            @else
                                                <span class="bg-gray-100 text-gray-800 px-3 py-1 rounded-full text-xs font-semibold">
                                                    {{ $genders[$siswa->gender] }}
                                                </span>
                                            @endif
                                        @else
                                            <span class="text-gray-400">-</span>
                                        @endif
                                    </td>
                                    <td class="p-4">
                                        @if(isset($rombels[$siswa->rombel]))
                                            <span class="bg-green-100 text-green-800 px-3 py-1 rounded-lg text-sm font-semibold">
                                                {{ $rombels[$siswa->rombel] }}
                                            </span>
                                        @else
                                            <span class="text-gray-400">-</span>
                                        @endif
                                    </td>
                                    <td class="p-4">
                                        <div class="text-gray-700 text-sm flex items-start max-w-xs">
                                            <svg class="w-4 h-4 mr-2 text-green-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                                            </svg>
                                            <span class="break-words" title="{{ $siswa->alamat }}">
                                                {{ Str::limit($siswa->alamat, 30) }}
                                            </span>
                                        </div>
                                    </td>
                                    <td class="p-4">
                                        <a href="tel:{{ $siswa->kontak }}" class="text-green-700 hover:text-green-900 font-medium flex items-center group">
                                            <svg class="w-4 h-4 mr-2 group-hover:scale-110 transition-transform" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/>
                                            </svg>
                                            {{ $siswa->kontak }}
                                        </a>
                                    </td>
                                    <td class="p-4">
                                        <a href="mailto:{{ $siswa->email }}" class="text-green-700 hover:text-green-900 font-medium flex items-center group">
                                            <svg class="w-4 h-4 mr-2 group-hover:scale-110 transition-transform" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                                                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
                                            </svg>
                                            <span class="break-all">{{ $siswa->email }}</span>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="p-12 text-center">
                                        <div class="flex flex-col items-center justify-center space-y-4">
                                            <div class="bg-green-100 p-4 rounded-full">
                                                <svg class="w-12 h-12 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m3 4.197a4 4 0 11-8 0 4 4 0 018 0z"/>
                                                </svg>
                                            </div>
                                            <div>
                                                <h3 class="text-lg font-semibold text-gray-900 mb-2">Tidak Ada Data Siswa</h3>
                                                <p class="text-gray-600">Tidak ada data siswa ditemukan</p>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Footer -->
                <div class="flex justify-end items-center mt-6">
                    <div class="pagination-wrapper">
                        {{ $siswas->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
    .pagination-wrapper .pagination {
        @apply flex space-x-1;
    }

    .pagination-wrapper .page-item {
        @apply inline-block;
    }

    .pagination-wrapper .page-link {
        @apply px-3 py-2 text-sm font-medium text-green-700 bg-green-100 border border-green-300 rounded-lg hover:bg-green-200 hover:text-green-800 transition-all duration-200;
    }

    .pagination-wrapper .page-item.active .page-link {
        @apply bg-green-700 text-white border-green-700 shadow-md;
    }

    .pagination-wrapper .page-item.disabled .page-link {
        @apply text-green-400 bg-green-50 cursor-not-allowed;
    }
    </style>
</div>