<?php

namespace App\Livewire\Industri;

use Livewire\Component;
use App\Models\Industri;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $gambar, $nama, $bidang_usaha, $alamat, $kontak, $email;

    public function create()    {
        $this->validate([
            'gambar' => 'required|image|max:2048',
            'nama' => 'required',
            'bidang_usaha' => 'required',
            'website' => 'required|url',
            'alamat' => 'required',
            'kontak' => 'required|numeric',
            'email' => 'required|email',
        ]);

        $gambarPath = $this->gambar->store('industri', 'public');

        Industri::create([
            'gambar' => $gambarPath,
            'nama' => $this->nama,
            'bidang_usaha' => $this->bidang_usaha,
            'website' => $this->website,
            'alamat' => $this->alamat,
            'kontak' => $this->kontak,
            'email' => $this->email,
        ]);

        session()->flash('success', 'Industri berhasil ditambahkan!');
        return redirect('/industri');
    }

    public function render()
    {
        return view('livewire.industri.create');
    }
}