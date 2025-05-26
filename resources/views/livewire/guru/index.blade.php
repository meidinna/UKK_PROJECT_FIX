<tbody>
    @forelse($gurus as $key => $guru)
    <tr class="bg-white border-b border-gray-200 hover:bg-gray-50">
        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
            {{ $guru->id }}
        </th>
        <td class="px-6 py-4">
            {{ $guru->nama }}
        </td>
        <td class="px-6 py-4">
            {{ $guru->nip }}
        </td>
        <td class="px-6 py-4">
            {{ $guru->gender }}
        </td>
        <td class="px-6 py-4">
            {{ $guru->alamat }}
        </td>
        <td class="px-6 py-4">
            {{ $guru->kontak }}
        </td>
        <td class="px-6 py-4">
            {{ $guru->email }}
        </td>
        <td class="px-6 py-4 cursor-pointer text-white font-medium">
            <a href="" class="bg-[#108981] hover:bg-[#059669] py-2 px-4 rounded-lg">View</a>
        </td>
        <div class="flex justify-end my-4">
            <form class="">
                <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                        </svg>
                    </div>
                    <input type="search" id="default-search" class="block w-full ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 wire:model.live="search" placeholder="Search" required />
                </div>
            </form>
        </div>
    </tr>
    @empty
    <p>Siswa tidak terdaftar.</p>
    @endforelse
</tbody>