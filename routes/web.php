<?php

use App\Http\Controllers\DosenController;
use App\Http\Controllers\KurikulumController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ProdiController;
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
// Route::get('/mahasiswa/{nama}', function($nama = "Faris") {
//     echo "<h1>Holaa Nama Saya $nama</h2>";
// });

//Route dengan parameter (wajib)
// Route::get('/mahasiswa2/{nama?}', function($nama = "Faris") {
//     echo "<h1>Holaa Nama Saya $nama</h2>";
// });

//Route dengan parameter > 1
Route::get('/profil/{nama?}/{pekerjaan?}',
    function($nama = "Faris", $pekerjaan = "Mahasiswa") {
        echo "<h1>Holaa Semua<h1>";
        echo "<h1>Nama Saya $nama. Saya adalah $pekerjaan</h2>";
});



// Route::get('/hubungi',function() {
//         echo "<h1>Hubungi Kami<h1>";
// })->name("call");       //named route

// Route::get("/contact","/hubungi");

// Route::get('/holaa',function() {
//         echo "<a href='".route('call')."'>". route('call')."</a>";
// });

Route::get("/hubungi",function(){
    echo "<h1>hubungi kami</h1>";
})->name("call"); //named route

Route::redirect("/contact","/hubungi");

Route::get("/halo",function(){
    echo " <a href='".route('call')."'>". route('call')."</a> ";
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

//slide 6 view
Route::get('/fakultas', function() {
    // return view('fakultas.index', ["ilkom" => "Fakultas Ilmu Komputer dan Rekayasa"]);

    // return view('fakultas.index', ["fakultas" => ["Fakultas
    // Ilmu Komputer dan Rekayasa", "Fakultas Ilmu Ekonomi"]]);

    // return view('fakultas.index')->with("fakultas", ["Fakultas
    // Ilmu Komputer dan Rekayasa", "Fakultas Ilmu Ekonomi"]);

    $kampus = "Universitas Multi Data Palembang";
    // $fakultas = [];
    $fakultas = ["Fakultas Ilmu Komputer dan Rekayasa", "Fakultas Ilmu Ekonomi"];
    return view('fakultas.index', compact('fakultas', 'kampus'));
});

Route::get('/prodi',[ProdiController::class,'index']);

Route::get('/fakultas',function() {

});

Route::get('/prodi',[ProdiController::class,'index']);
Route::resource('/Kurikulum',KurikulumController::class);

Route::apiResource("dosen",DosenController::class);

Route::get('/mahasiswa/insert-elq',[MahasiswaController::class, 'insertElq']);
Route::get('/mahasiswa/update-elq',[MahasiswaController::class, 'updateElq']);
Route::get('/mahasiswa/delete-elq',[MahasiswaController::class, 'deleteElq']);
Route::get('/mahasiswa/select-elq',[MahasiswaController::class, 'selectElq']);

//Membuat join dengan DB Facade
Route::get('/prodi/all-join-facade', [ProdiController::class, 'allJoinFacade']);

//Membuat join dengan Eloquent
Route::get('/prodi/all-join-elq', [ProdiController::class, 'allJoinElq']);

Route::get('/mahasiswa/all-join-elq', [MahasiswaController::class, 'allJoinElq']);

//Route prodi/create
Route::get('/prodi/create', [ProdiController::class,'create']);

//Route prodi/store
Route::post('prodi/store', [ProdiController::class,'store']);

//-----------------
// Route menampilkan semua data program studi:
Route::get('/prodi', [ProdiController::class,
'index'])->name('prodi.index');

// Route menampilkan satu data (detail) program studi:
Route::get('/prodi/{id}', [ProdiController::class,
'show'])->name('prodi.show');

Route::get('/prodi', [ProdiController::class,
'index'])->name('prodi.index');

// Menampilkan satu data program studi
Route::get('/prodi/{prodi}', [ProdiController::class, 'show'])->name('prodi.show');

// UPDATE
// Route menampilkan form edit program studi:
Route::get('/prodi/{prodi}/edit', [ProdiController::class, 'edit'])->name('prodi.edit');

//vRoute untuk proses update data program studi:
Route::patch('/prodi/{prodi}', [ProdiController::class,
'update'])->name('prodi.update');

// Update(Form Edit)
Route::get('/prodi/{prodi}/edit', [ProdiController::class, 'edit'])->name('prodi.edit');

// Update (Proses Update)
Route::patch('/prodi/{prodi}', [ProdiController::class, 'update'])
->name('prodi.update');

// DELETE
Route::delete('/prodi/{prodi}', [ProdiController::class, 'destroy'])->name('prodi.destroy');



