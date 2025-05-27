<div class="p-6 bg-white/90 backdrop-blur-sm rounded-2xl shadow-xl border border-green-200 max-w-2xl mx-auto mt-10">
    <h2 class="text-2xl font-semibold text-green-800 mb-6">Edit Data Industri</h2>

    {{-- Tombol Kembali --}}
    <div class="flex justify-end mb-4">
        <a href="{{ route('industri') }}"
           class="bg-green-100 hover:bg-green-200 text-green-800 py-2 px-4 rounded-lg text-sm font-medium transition-all duration-200">
            ← Kembali
        </a>
    </div>

    {{-- Upload Logo Industri --}}
    <div class="mb-5">
        <label for="foto" class="block mb-2 text-sm font-medium text-green-900">Upload Logo Industri</label>
        <input type="file" wire:model="foto" id="foto"
               class="text-sm rounded-xl block w-full p-2.5 bg-green-50 border border-green-300 text-green-800 focus:ring-green-500 focus:border-green-500 @error('foto') border-red-600 @enderror"
               accept="image/*" />

        @error('foto')
            <span class="text-red-600 text-sm">{{ $message }}</span>
        @enderror

        @if ($foto)
            <div class="mt-3">
                <p class="text-sm text-green-800 mb-2">Preview Logo Baru:</p>
                <img src="{{ $foto->temporaryUrl() }}" class="w-24 h-24 rounded-lg shadow border border-green-300" />
            </div>
        @endif
    </div>

    {{-- Input Fields --}}
    @php
        $fields = [
            'nama' => 'Nama Industri',
            'bidang_usaha' => 'Bidang Usaha',
            'website' => 'Website',
            'email' => 'Email',
            'kontak' => 'Kontak',
        ];
    @endphp

    @foreach ($fields as $id => $label)
        <div class="mb-5">
            <label for="{{ $id }}" class="block mb-2 text-sm font-medium text-green-900">{{ $label }}</label>
            <input type="{{ $id === 'email' ? 'email' : ($id === 'website' ? 'url' : 'text') }}"
                   wire:model="{{ $id }}" id="{{ $id }}"
                   class="text-sm rounded-xl block w-full p-2.5 bg-green-50 text-green-900 border border-green-300 focus:ring-green-500 focus:border-green-500 @error($id) border-red-600 @enderror"
                   required>
            @error($id)
                <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
        </div>
    @endforeach

    {{-- Alamat --}}
    <div class="mb-5">
        <label for="alamat" class="block mb-2 text-sm font-medium text-green-900">Alamat</label>
        <textarea wire:model='alamat' id="alamat" rows="3"
                  class="text-sm rounded-xl block w-full p-2.5 bg-green-50 text-green-900 border border-green-300 focus:ring-green-500 focus:border-green-500 @error('alamat') border-red-600 @enderror"
                  required></textarea>
        @error('alamat')
            <span class="text-red-600 text-sm">{{ $message }}</span>
        @enderror
    </div>

    {{-- Tombol Simpan --}}
    <div class="flex justify-end">
        <button wire:click="update"
                class="bg-green-700 hover:bg-green-900 text-white py-2 px-6 rounded-xl text-sm font-semibold shadow transition-all duration-200">
            Simpan Perubahan
        </button>
    </div>
</div>
