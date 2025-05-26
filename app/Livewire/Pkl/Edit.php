<?php

namespace App\Livewire\Pkl;

use Livewire\Component;
use App\Models\Pkl;
use App\Models\Siswa;
use App\Models\Guru;
use App\Models\Industri;

class Edit extends Component
{
    public $pklId;
    public $siswa_id, $guru_id, $industri_id;
    public $mulai, $selesai;

    public function mount($id)
    {
        $this->pklId = $id;
        $pkl = Pkl::findOrFail($id);

        $this->siswa_id = $pkl->siswa_id;
        $this->guru_id = $pkl->guru_id;
        $this->industri_id = $pkl->industri_id;
        $this->mulai = $pkl->mulai;
        $this->selesai = $pkl->selesai;
    }

    public function update()
    {
        $this->validate([
            'siswa_id' => 'required|exists:siswas,id',
            'guru_id' => 'required|exists:gurus,id',
            'industri_id' => 'required|exists:industris,id',
            'mulai' => 'required|date',
            'selesai' => 'required|date|after_or_equal:mulai',
        ]);

        $siswaTerdaftar = Pkl::where('siswa_id', $this->siswa_id)
                             ->where('id', '!=', $this->pklId)
                             ->exists();

        if ($siswaTerdaftar) {
            session()->flash('error', 'Siswa ini sudah terdaftar di PKL');
            return;
        }

        $pkl = Pkl::findOrFail($this->pklId);

        $pkl->update([
            'siswa_id' => $this->siswa_id,
            'guru_id' => $this->guru_id,
            'industri_id' => $this->industri_id,
            'mulai' => $this->mulai,
            'selesai' => $this->selesai,
        ]);

        session()->flash('message', 'Data PKL berhasil diperbarui.');
        return redirect()->route('pkl');
    }

    public function render()
    {
        return view('livewire.pkl.edit', [
            'siswas' => Siswa::all(),
            'gurus' => Guru::all(),
            'industris' => Industri::all(),
        ]);
    }
}