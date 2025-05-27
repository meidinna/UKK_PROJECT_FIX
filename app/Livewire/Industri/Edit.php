<?php

namespace App\Livewire\Industri;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Industri;
use Illuminate\Support\Facades\Storage;

class Edit extends Component
{
    use WithFileUploads;

    public $industriId;
    public $foto, $nama, $bidang_usaha, $website, $email, $kontak, $alamat;

    public function mount($id)
    {
        $this->industriId = $id;
        $industri = Industri::findOrFail($id);

        $this->nama = $industri->nama;
        $this->bidang_usaha = $industri->bidang_usaha;
        $this->website = $industri->website;
        $this->email = $industri->email;
        $this->kontak = $industri->kontak;
        $this->alamat = $industri->alamat;

        // kita tidak langsung isi $this->foto karena tipe-nya sekarang file
    }

    public function update()
    {
        $industri = Industri::findOrFail($this->industriId);

        $this->validate([
            'foto' => 'nullable|image|max:2048', // maksimal 2MB
            'nama' => 'required|string|max:255',
            'bidang_usaha' => 'required|string|max:255',
            'website' => 'required|url|max:255',
            'email' => 'required|email|max:255|unique:industris,email,' . $this->industriId,
            'kontak' => 'required|numeric',
            'alamat' => 'required|string|max:500',
        ]);

        // Jika ada file baru diunggah
        if ($this->foto) {
            $fotoPath = $this->foto->store('industri', 'public');
            $industri->foto = $fotoPath;
        }

        $industri->update([
            'nama' => $this->nama,
            'bidang_usaha' => $this->bidang_usaha,
            'website' => $this->website,
            'email' => $this->email,
            'kontak' => $this->kontak,
            'alamat' => $this->alamat,
        ]);

        session()->flash('message', 'Data Industri Berhasil Diupdate.');
        return redirect()->route('industri');
    }

    public function render()
    {
        return view('livewire.industri.edit');
    }
}
