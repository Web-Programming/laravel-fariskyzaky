<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    //Jika nama table berbeda
    protected $table = "mahasiswa";

    //Untuk mengatur kolom yang boleh di isi saat mass insert
    //fillable adalah kolom apa saja yg bisa di insert

    //Misal hanya ingin mengisi NPM dan nama saja
    protected $fillable = ['npm', 'nama',
    'tempat_lahir',
    'tanggal_lahir'];

    //Untuk mengatur kolom yang tidak boleh diisi / dilindungi
    //Misal ada kolom npm yg tidak boleh diisi, maka kolom tersebut dijaga / tidak boleh
    protected $guarded = [];


}
