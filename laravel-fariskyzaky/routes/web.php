<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Buat route kehalaman profil

Route::get('profil', function () {
    return view('profil');
});

//Route dengan parameter (wajib)
Route::get('/mahasiswa/{nama}', function($nama = "Faris") {
    echo "<h1>Holaa Nama Saya $nama</h2>";
});

//Route dengan parameter (wajib)
Route::get('/mahasiswa2/{nama?}', function($nama = "Faris") {
    echo "<h1>Holaa Nama Saya $nama</h2>";
});

//Route dengan parameter > 1
Route::get('/profil/{nama?}/{pekerjaan?}', 
    function($nama = "Faris", $pekerjaan = "Mahasiswa") {
        echo "<h1>Holaa Semua<h1>";
        echo "<h1>Nama Saya $nama. Saya adalah $pekerjaan</h2>";
});

//Redirect
Route::get('/hubungi', function() {
        echo "<h1>Hubungi Kami<h1>";
})->name("call");       //named route

Route::get("/contact", "/hubungi");

Route::get('/holaa', function() {
        echo "<a href='". route('call') . "'>" . route('call'). "</a>";
});


Route::prefix('/mahasiswa')->group(function() {
    Route::get("/jadwal", function(){
        echo "<h1>Jadwal Mahasiswa<h1>";
    });
    Route::get("/materi", function() {
        echo "<h1>JMateri Perkuliahan<h1>";
    });
    //dan lain2
});