<?php

namespace App\Livewire\Siswa;

use Livewire\Component;
use App\Models\Siswa;
use Illuminate\Support\Str;

class Index extends Component
{
    public $search = '';
    public $selected_gender = '';
    public $selected_rombel = '';
    public $selected_abjad = '';

    public function render()
    {
        $genders = [
            'L' => 'Laki-Laki',
            'P' => 'Perempuan',
        ];

        $rombels = [
            'sijaA' => 'SIJA A',
            'sijaB' => 'SIJA B',
        ];

        $siswas = Siswa::query()
            ->when($this->search, function($query) {
                $query->where(function($q) {
                    $q->where('nama', 'like', '%'.$this->search.'%')
                      ->orWhere('nis', 'like', '%'.$this->search.'%')
                      ->orWhere('alamat', 'like', '%'.$this->search.'%')
                      ->orWhere('kontak', 'like', '%'.$this->search.'%')
                      ->orWhere('email', 'like', '%'.$this->search.'%');
                });
            })
            ->when($this->selected_gender, fn($query) => $query->where('gender', $this->selected_gender))
            ->when($this->selected_rombel, fn($query) => $query->where('rombel', $this->selected_rombel))
            ->when($this->selected_abjad === 'A-Z', fn($query) => $query->orderBy('nama', 'asc'))
            ->when($this->selected_abjad === 'Z-A', fn($query) => $query->orderBy('nama', 'desc'))
            ->paginate(10);

        return view('livewire.siswa.index', compact('siswas', 'genders', 'rombels'))
            ->layout('layouts.app', ['title' => 'Dashboard Siswa']);
    }

    public function resetFilters()
    {
        $this->reset(['search', 'selected_gender', 'selected_rombel', 'selected_abjad']);
    }
}