<div class="container mx-auto px-4 py-6">
    <!-- Header and Filters -->
    <div class="mb-8">
        <h1 class="text-2xl font-bold text-gray-800 mb-4">Gender</h1>

        <!-- Gender Filter -->
        <div class="flex space-x-4 mb-6">
            <button wire:click="$set('genderFilter', '')" 
                    class="{{ !$genderFilter ? 'bg-blue-500 text-white' : 'bg-gray-200' }} px-4 py-2 rounded">
                Semua
            </button>
            <button wire:click="$set('genderFilter', 'L')" 
                    class="{{ $genderFilter === 'L' ? 'bg-blue-500 text-white' : 'bg-gray-200' }} px-4 py-2 rounded">
                Laki-Laki
            </button>
            <button wire:click="$set('genderFilter', 'P')" 
                    class="{{ $genderFilter === 'P' ? 'bg-blue-500 text-white' : 'bg-gray-200' }} px-4 py-2 rounded">
                Perempuan
            </button>
        </div>
    </div>

    <!-- Table Section -->
    <div class="bg-white shadow-md rounded-lg overflow-hidden mb-8">
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th class="px-6 py-3">No</th>
                        <th class="px-6 py-3">Nama</th>
                        <th class="px-6 py-3">NIP</th>
                        <th class="px-6 py-3">Gender</th>
                        <th class="px-6 py-3">Alamat</th>
                        <th class="px-6 py-3">Kontak</th>
                        <th class="px-6 py-3">Email</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($gurus as $index => $guru)
                        <tr class="bg-white border-b hover:bg-gray-50">
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                {{ $index + 1 }}
                            </td>
                            <td class="px-6 py-4">{{ $guru->nama }}</td>
                            <td class="px-6 py-4">{{ $guru->nip }}</td>
                            <td class="px-6 py-4">
                                {{ $guru->gender === 'L' ? 'Laki-Laki' : ($guru->gender === 'P' ? 'Perempuan' : $guru->gender) }}
                            </td>
                            <td class="px-6 py-4">{{ $guru->alamat }}</td>
                            <td class="px-6 py-4">{{ $guru->kontak }}</td>
                            <td class="px-6 py-4">{{ $guru->email }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-6 py-4 text-center text-gray-500">
                                @if($genderFilter)
                                    Tidak ditemukan guru dengan filter gender yang dipilih.
                                @else
                                    Tidak ada data guru yang ditemukan.
                                @endif
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
