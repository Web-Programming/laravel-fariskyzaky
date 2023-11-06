<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    use HasFactory;
    //cara menggunakan tabel prodis dengan mahasiswa
    public function mahasiswa()
    {
        return $this->hasMany('App\Models\Mahasiswa');
    }
}