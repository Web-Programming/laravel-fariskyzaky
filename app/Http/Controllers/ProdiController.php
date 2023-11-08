<?php

namespace App\Http\Controllers;


use App\Models\Prodi;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\DB;

class ProdiController extends Controller {

    public function allJoinFacade (){
        $kampus = "Univeristas Multi Data Palembang";
        $result = DB::select('select mahasiswa.*, prodis.nama as nama_prodi from prodis, mahasiswa where prodis.id = mahasiswa.prodi_id');
        return view('prodi.index', ['allmahasiswaprodi' => $result, 'kampus' => $kampus])-> with('kampus', $kampus);
    }

    public function allJoinElq() {
        // $prodis = Prodi::all();
        $prodis = Prodi::with('mahasiswa')->get();
        foreach ($prodis as $prodi) {
            echo "<h3>{$prodi->nama}</h3>";
            echo "<hr>Mahasiswa: ";
            foreach ($prodi->mahasiswa as $mhs) {
                echo $mhs->nama_mahasiswa . ", ";
            }
            echo "<hr>";
        }
    }
}
?>