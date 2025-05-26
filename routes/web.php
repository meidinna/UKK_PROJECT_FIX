<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'CheckUserRoles:super_admin,siswa',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/dataPkl', App\Livewire\Pkl\Index::class)->name('pkl');
    Route::get('/tambahDataPkl', App\Livewire\Pkl\Create::class)->name('pklCreate');
    Route::get('/lihatDataPkl/{id}', App\Livewire\Pkl\View::class)->name('pklView');
    Route::get('/lihatDataPkl/{id}/edit', App\Livewire\Pkl\Edit::class)->name('pklEdit');
    Route::get('/guru', App\Livewire\Guru\Index::class)->name('guru');
    Route::get('/siswa', App\Livewire\Siswa\Index::class)->name('siswa');
    Route::get('/industri', App\Livewire\Industri\Index::class)->name('industri');
    Route::get('/industri/tambah', App\Livewire\Industri\Create::class)->name('industriCreate');
}); 