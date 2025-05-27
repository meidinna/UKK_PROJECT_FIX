<div class="shadow-md rounded-xl max-w-2xl mx-auto mt-8 border border-green-200 bg-white/90 backdrop-blur-sm">
    <div class="py-3 px-6 text-white bg-green-800 rounded-t-xl font-semibold text-base">
        Industri
    </div>

    @forelse($industris as $industri)
        <div class="px-6 py-3 flex gap-6 border-t border-green-300 bg-green-50 hover:bg-green-100 transition-all duration-200">
            <div class="flex-shrink-0">
                <img src="{{ asset('storage/' . $industri->foto) }}"
                     class="w-20 h-24 rounded-md shadow-lg border border-green-200" />
            </div>
            <div class="w-full">
                <div class="text-base font-semibold text-green-900">
                    {{ $industri->nama }}
                </div>
                <div class="text-xs text-green-700 py-1">
                    {{ $industri->bidang_usaha }}
                </div>
                <div class="space-y-1">
                    <div class="text-sm flex items-center text-green-800">
                        <i class="fas fa-phone-alt text-xs pr-2 text-green-700"></i>
                        {{ $industri->kontak }}
                    </div>
                    <div class="text-sm flex items-center text-green-800">
                        <i class="fas fa-envelope text-xs pr-2 text-green-700"></i>
                        {{ $industri->email }}
                    </div>
                    <div class="text-sm flex items-center text-green-800">
                        <i class="fas fa-globe text-xs pr-2 text-green-700"></i>
                        {{ $industri->website }}
                    </div>
                    <div class="text-sm mt-3 flex items-start text-green-800">
                        <i class="fas fa-map-marker-alt text-xs pr-2 text-green-700 mt-0.5"></i>
                        <span>{{ $industri->alamat }}</span>
                    </div>
                </div>

                <div class="flex justify-end items-center mt-3">
                    <a href="{{ route('industriEdit', $industri->id) }}"
                       class="bg-green-700 hover:bg-green-900 py-1.5 px-3 rounded-lg text-white text-sm shadow transition duration-200">
                        Edit
                    </a>
                </div>
            </div>
        </div>
    @empty
        <h1 class="px-6 py-3 text-green-700 text-sm">Data Industri belum ditemukan. Kamu bisa menambahkannya!</h1>
    @endforelse
</div>
