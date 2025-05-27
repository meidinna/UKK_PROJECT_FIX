<div class="relative overflow-x-auto bg-white/90 backdrop-blur-sm shadow-xl rounded-2xl p-6 border border-green-200">
    {{-- Session Messages (Success/Error) --}}
    @if (session()->has('success'))
        <div class="mb-4 p-4 text-base text-green-700 bg-green-100 rounded-lg" role="alert">
            <span class="font-medium">Success!</span> {{ session('success') }}
        </div>
    @endif

    @if (session()->has('error'))
        <div class="mb-4 p-4 text-base text-red-700 bg-red-100 rounded-lg" role="alert">
            <span class="font-medium">Error!</span> {{ session('error') }}
        </div>
    @endif

    <div class="flex justify-between items-center mb-6">
        <a href="{{ route('pklCreate') }}"
           class="text-white bg-green-800 hover:bg-green-900 focus:ring-4 focus:ring-green-500 font-semibold rounded-lg text-sm px-4 py-2 shadow">
            Tambahkan Data PKL
        </a>

        <form>
            <label for="default-search" class="sr-only">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-green-700" xmlns="http://www.w3.org/2000/svg" fill="none"
                         viewBox="0 0 20 20" aria-hidden="true">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                              stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </div>
                <input type="search" id="default-search" placeholder="Search"
                       class="block w-full ps-10 text-sm text-green-900 border border-green-300 rounded-xl bg-green-50 hover:bg-green-100 focus:ring-green-500 focus:border-green-500 transition-all duration-200"
                       wire:model.live="search" required />
            </div>
        </form>
    </div>

    <div class="overflow-hidden rounded-xl border border-green-200 shadow-sm">
        <table class="w-full text-sm text-left text-green-900">
            <thead class="text-xs text-white uppercase bg-green-800">
                <tr>
                    <th class="px-6 py-4">No</th>
                    <th class="px-6 py-4">NIS</th>
                    <th class="px-6 py-4">Nama</th>
                    <th class="px-6 py-4">Guru Pembimbing</th>
                    <th class="px-6 py-4">Industri</th>
                    <th class="px-6 py-4">Bidang Usaha</th>
                    <th class="px-6 py-4">Mulai</th>
                    <th class="px-6 py-4">Selesai</th>
                    <th class="px-6 py-4">Durasi</th>
                    <th class="px-6 py-4">Aksi</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-green-100 bg-white">
                @php $user = Auth::user(); @endphp
                @forelse ($pkls as $key => $pkl)
                    <tr class="hover:bg-green-50 transition">
                        <td class="px-6 py-4 font-medium">{{ $pkl->id }}</td>
                        <td class="px-6 py-4">{{ $pkl->siswa->nis }}</td>
                        <td class="px-6 py-4">{{ $pkl->siswa->nama }}</td>
                        <td class="px-6 py-4">{{ $pkl->guru->nama }}</td>
                        <td class="px-6 py-4">{{ $pkl->industri->nama }}</td>
                        <td class="px-6 py-4">{{ $pkl->industri->bidang_usaha }}</td>
                        <td class="px-6 py-4">{{ \Carbon\Carbon::parse($pkl->mulai)->format('d F Y') }}</td>
                        <td class="px-6 py-4">{{ \Carbon\Carbon::parse($pkl->selesai)->format('d F Y') }}</td>
                        <td class="px-6 py-4">
                            {{ \Carbon\Carbon::parse($pkl->mulai)->diffInDays(\Carbon\Carbon::parse($pkl->selesai)) }} hari
                        </td>

                        <td class="px-6 py-4">
                            @if ($user && $user->email === $pkl->siswa->email)
                                <a href="{{ route('pklEdit', ['id' => $pkl->id]) }}" 
                                   class="bg-[#FFD700] hover:bg-[#FFA500] text-white py-2 px-4 rounded-lg text-sm font-medium w-full text-center">
                                    Edit
                                </a>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="10" class="px-6 py-4 text-center text-green-700">
                            Siswa tidak terdaftar.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
