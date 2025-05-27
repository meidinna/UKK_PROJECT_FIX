<div class="max-w-4xl mx-auto mt-8 p-6 bg-white rounded-lg shadow-md">
    {{-- Judul Form --}}
    <h2 class="text-2xl font-semibold text-gray-800 mb-6">Tambahkan Data PKL</h2>

    <form wire:submit.prevent="store" class="w-full space-y-6">
        {{-- Baris 1: Nama Siswa --}}
        <div>
            <label for="siswa_id" class="block mb-2 text-lg font-medium text-black/70">Nama Siswa</label>
            <select wire:model="siswa_id" disabled
                class="text-sm rounded-lg block w-full p-2.5 bg-[#E7EBEB] text-black-700 border border-[#2E7D65]"
                required>
                <!-- ID siswa -->
                <!-- nama siswa yang tampil -->
                <option value="{{ $siswa_id }}">{{ $nama_siswa }}</option>
            </select>
            @error('siswa_id')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        {{-- Baris 2: Nama Guru dan Nama Industri --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="guru_id" class="block mb-2 text-base font-medium text-gray-700">Nama Guru</label>
                <select wire:model="guru_id" id="guru_id"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5
                        @error('guru_id') border-red-500 focus:border-red-500 @enderror"
                    required>
                    <option value="">Pilih Guru</option>
                    @foreach($gurus as $guru)
                        <option value="{{ $guru->id }}">{{ $guru->nama }}</option>
                    @endforeach
                </select>
                @error('guru_id')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="industri_id" class="block mb-2 text-base font-medium text-gray-700">Nama Industri</label>
                <select wire:model="industri_id" id="industri_id"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5
                        @error('industri_id') border-red-500 focus:border-red-500 @enderror"
                    required>
                    <option value="">Pilih Industri</option>
                    @foreach($industris as $industri)
                        <option value="{{ $industri->id }}">{{ $industri->nama }}</option>
                    @endforeach
                </select>
                @error('industri_id')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        {{-- Baris 3: Mulai dan Selesai --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="tanggal_mulai" class="block mb-2 text-base font-medium text-gray-700">Mulai</label>
                <input wire:model="mulai" type="date" id="tanggal_mulai"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5
                        @error('mulai') border-red-500 focus:border-red-500 @enderror"
                    required>
                @error('mulai')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="tanggal_selesai" class="block mb-2 text-base font-medium text-gray-700">Selesai</label>
                <input wire:model="selesai" type="date" id="tanggal_selesai"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5
                        @error('selesai') border-red-500 focus:border-red-500 @enderror"
                    required>
                @error('selesai')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        {{-- Tombol Submit --}}
        <div class="flex justify-end pt-4">
            <button type="submit"
                wire:loading.attr="disabled"
                class="px-6 py-2.5 text-lg font-semibold text-white bg-green-600 rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                Simpan Data
            </button>
        </div>
    </form>
</div>
