<div class="shadow-md rounded-xl">
    <div class="py-4 px-8 text-[#F6F7EF] bg-[#2E7D65] rounded-t-xl font-medium text-lg">
        Industri
    </div>
    @forelse($industris as $industri)
    <div class="px-8 py-4 flex gap-8 rounded-b-xl border-t border-t-[#2E7D65] bg-[#F6F7EF]">
        <div class="">
            <img src="{{ asset('storage/' . $industri->foto) }}" 
            class="w-24 h-28 rounded-md shadow-xl" />
        </div>
        <div class="">
            <div class="text-lg font-semibold">
                {{ $industri->nama }}
            </div>
            <div class="text-sm text-black/50 py-2">
                {{ $industri->bidang_usaha }}
            </div>
            <div>
                <div class="text-base font-regular">
                    <i class="fas fa-phone-alt pr-2 text-[#2E7D65]"></i>
                    {{ $industri->kontak }}
            </div>
                <div class="text-base font-regular">
                    <i class="fas fa-envelope pr-2 text-[#2E7D65]"></i>
                    {{ $industri->email }}
                </div>
                <div class="text-base font-regular">
                    <i class="fas fa-globe pr-2 text-[#2E7D65]"></i>
                    {{ $industri->website }}
                </div>
                <div class="text-base font-regular mt-4">
                    <i class="fas fa-map-marker-alt pr-2 text-[#2E7D65]"></i>
                    {{ $industri->alamat }}
                </div>
            </div>
        </div>
    @empty
        <h1>Data Industri Belum Ditemukan, Kamu Bisa Menambahkannya!</h1>
    @endforelse
</div>