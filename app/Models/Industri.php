<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Industri extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'gambar', 'bidang_usaha', 'website', 'alamat', 'kontak', 'email'];

    //relasi dengan pkl
    public function pkls()
    {
        return $this->hasMany(Pkl::class);
    }
}
