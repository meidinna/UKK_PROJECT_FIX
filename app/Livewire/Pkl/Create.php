<?php

namespace App\Livewire\Pkl;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Pkl;
use App\Models\Siswa;
use App\Models\Guru;
use App\Models\Industri;

class Create extends Component
{
    public $siswa_id, $guru_id, $industri_id, $mulai, $selesai;

    // menyimpan nama siswa yang sedang login
    public $nama_siswa;

    // otomatis dijalankan saat komponen livewire dibuat
    public function mount()
    {
        $userEmail = Auth::user()->email;
        $siswa = Siswa::where('email', $userEmail)->first();

        if ($siswa) {
            $this->siswa_id = $siswa->id;
            $this->nama_siswa = $siswa->nama;
        }
    }

    // ✅ METHOD STORE TAMBAHAN
    public function store()
    {
        // Validasi data
        $this->validate([
            'siswa_id' => 'required|exists:siswas,id',
            'guru_id' => 'required|exists:gurus,id',
            'industri_id' => 'required|exists:industris,id',
            'mulai' => 'required|date',
            'selesai' => 'required|date|after_or_equal:mulai',
        ]);

        // Simpan ke database
        Pkl::create([
            'siswa_id' => $this->siswa_id,
            'guru_id' => $this->guru_id,
            'industri_id' => $this->industri_id,
            'mulai' => $this->mulai,
            'selesai' => $this->selesai,
        ]);

        // Reset form dan tampilkan pesan sukses
        $this->reset(['guru_id', 'industri_id', 'mulai', 'selesai']);
        session()->flash('success', 'Data PKL berhasil disimpan.');
        return redirect('/dataPkl');
    }

    public function render()
    {
        $pkls = Pkl::all();
        $gurus = Guru::all();
        $industris = Industri::all();

        return view('livewire.pkl.create', [
            'pkls' => $pkls,
            'gurus' => $gurus,
            'industris' => $industris,
        ]);
    }
}
