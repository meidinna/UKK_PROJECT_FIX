<?php

namespace App\Livewire\Guru;

use Livewire\Component;
use App\Models\Guru;

class Index extends Component
{
    public $search = '';
    public $genderFilter = '';
    public $sortField = 'nama';
    public $sortDirection = 'asc';

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortDirection = 'asc';
        }
        $this->sortField = $field;
    }

    public function render()
    {
        $gurus = Guru::query()
            ->when($this->search, function ($query) {
                $query->where(function ($q) {
                    $q->where('nama', 'like', '%' . $this->search . '%')
                      ->orWhere('nip', 'like', '%' . $this->search . '%')
                      ->orWhere('alamat', 'like', '%' . $this->search . '%')
                      ->orWhere('kontak', 'like', '%' . $this->search . '%')
                      ->orWhere('email', 'like', '%' . $this->search . '%');
                });
            })
            ->when($this->genderFilter, function ($query) {
                $query->where('gender', $this->genderFilter);
            })
            ->orderBy($this->sortField, $this->sortDirection)
            ->get();

        return view('livewire.guru.index', [
            'gurus' => $gurus
        ]);
    }
}