<?php

namespace App\Livewire\Guru;

use Livewire\Component;
use App\Models\Guru;

class Index extends Component
{
    public function render()
    {
        $gurus = Guru::all();
        
        return view('livewire.guru.index', [
            'gurus' => $gurus,
        ]);
    }
}
