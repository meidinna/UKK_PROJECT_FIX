<div class="">
    <form class="w-full">
        <div class="">
            <label for="gambar" class="block mb-2 text-lg font-medium text-black/70">Gambar</label>
            <input wire:model="gambar" type="file" id="gambar"
                class="text-sm rounded-lg block w-full p-2.5 bg-[#E7EBE8] text-black-700 border border-[#2E7D65]
                focus:ring-[#2E7D65] focus:border-[#2E7D65]"
                        @error('gambar') border-red -600 @enderror"
            required />
            @error('gambar')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>
    </form>
</div>

<div class="">
    <form class="w-full">
        <div class="">
            <label for="nama" class="block mb-2 text-lg font-medium text-black/70">Nama</label>
            <input wire:model='nama' type="text" id="nama" placeholder="Nama Industri"
                class="text-sm rounded-lg block w-full p-2.5 bg-[#E7EBE8] text-black-700 border border-[#2E7D65]
                focus:ring-[#2E7D65] focus:border-[#2E7D65]"
                        @error('nama') border-red-600 @enderror"
            required />
            @error('nama')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>   
    </form>
</div>