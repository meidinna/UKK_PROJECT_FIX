<div class="relative overflow-x-auto bg-white shadow rounded-xl p-4">
    <div class="flex justify-between items-center mb-4">
        <a href="{{ route('pklCreate') }}"
           class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-4 py-2">
            Tambahkan Data PKL
        </a>

        <form>
            <label for="default-search" class="sr-only">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                         fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                              stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </div>
                <input type="search" id="default-search" placeholder="Search"
                       class="block w-full ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                       wire:model.live="search" required />
            </div>
        </form>
    </div>

    <div class="bg-white shadow-md rounded-xl overflow-hidden p-4">
        <div class="overflow-x-auto rounded-lg border border-gray-200">
            <table class="w-full text-sm text-left text-gray-700">
                <thead class="text-xs text-gray-700 uppercase bg-gray-100">
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
                        <th class="px-6 py-4"></th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200">
                    @forelse ($pkls as $key => $pkl)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 font-medium text-gray-900">
                                {{ $pkl->id }}
                            </td>
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
                                <div class="flex flex-col gap-2 items-start">
                                    <a href="{{ route('pklView', ['id' => $pkl->id]) }}"
                                       class="bg-[#180981] hover:bg-[#059669] text-white py-2 px-4 rounded-lg text-sm font-medium w-full text-center">
                                        View
                                    </a>
                                    <a href="{{ route('pklEdit', ['id' => $pkl->id]) }}"
                                       class="bg-[#FFD700] hover:bg-[#FFA500] text-white py-2 px-4 rounded-lg text-sm font-medium w-full text-center">
                                        Edit
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="10" class="px-6 py-4 text-center text-gray-500">
                                Siswa tidak terdaftar.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
