<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use \Illuminate\Support\Facades\DB;

class ProdiController extends Controller {

    public function index (){
        $kampus = "Univeristas Multi Data Palembang";
        $result = DB::select('select mahasiswa.*, prodi.nama as nama _prodis, mahasiswa
        where prodis.id = mahasiswa.prodi_id');
        return view('prodi.index', ['allmahasiswaprodi' => $result, 'kampus' => $kampus])-> with('kampus', $kampus);
    }
}

?>