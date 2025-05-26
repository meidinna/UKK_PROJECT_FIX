<form wire:submit.prevent="update" class="space-y-4">
    <div>
        <label for="siswa_id" class="block text-sm font-medium text-gray-700">Nama Siswa</label>
        <select wire:model="siswa_id" id="siswa_id" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            <option value="">-- Pilih Siswa --</option>
            @foreach($siswas as $siswa)
                <option value="{{ $siswa->id }}">{{ $siswa->nama }}</option>
            @endforeach
        </select>
        @error('siswa_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
    </div>

    <div>
        <label for="guru_id" class="block text-sm font-medium text-gray-700">Nama Guru</label>
        <select wire:model="guru_id" id="guru_id" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            <option value="">-- Pilih Guru --</option>
            @foreach($gurus as $guru)
                <option value="{{ $guru->id }}">{{ $guru->nama }}</option>
            @endforeach
        </select>
        @error('guru_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
    </div>

    <div>
        <label for="industri_id" class="block text-sm font-medium text-gray-700">Nama Industri</label>
        <select wire:model="industri_id" id="industri_id" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            <option value="">-- Pilih Industri --</option>
            @foreach($industris as $industri)
                <option value="{{ $industri->id }}">{{ $industri->nama }}</option>
            @endforeach
        </select>
        @error('industri_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
    </div>

    <div>
        <label for="mulai" class="block text-sm font-medium text-gray-700">Tanggal Mulai</label>
        <input type="date" wire:model="mulai" id="mulai" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
        @error('mulai') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
    </div>

    <div>
        <label for="selesai" class="block text-sm font-medium text-gray-700">Tanggal Selesai</label>
        <input type="date" wire:model="selesai" id="selesai" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
        @error('selesai') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
    </div>

    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-md">
        Update Data
    </button>
</form>