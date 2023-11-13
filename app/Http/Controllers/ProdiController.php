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

    //Controller create()
    public function create()
    {
        return view('prodi.create');
    }

    //Controller Store()
    public function store(Request $request)
    {
        // dump($request);
        // echo $request->nama;

        $validateData = $request->validate([
            'nama'=> 'required|min:5|max:20',
        ]);
        dump($validateData);
        echo $validateData['nama'];

        $prodi = new Prodi();   // buat object prodi
        $prodi->nama = $validateData['nama'];   // Simpai nilai input ($validateData['nama]) ke dalam
        // propert nama prodi ($prodi->nama)
        $prodi->save(); // Simpan ke dalam tabel prodis

        // return "Data prodi $prodi->nama berhasil disimpan ke database"; //tampilkan pesan berhasil
        $request->session()->flash('info', "Data prodi $prodi->nama berhasil disimpan ke database");
        return redirect()->route('prodi.create');
    }

    public function index() {
        $prodi = Prodi::all();
        return view('prodi.index')->with('prodis', $prodi);
    }

    public function show(Prodi $prodi) {
        return view('prodi.show', ['prodi' => $prodi]);
    }

    public function edit(Prodi $prodi) {
        return view('prodi.edit', ['prodi'=> $prodi]);
    }

    public function update(Request $request, Prodi $prodi) {
        // dump($request->all());
        // dump($prodi);
        $validate = $request->validate([
            'nama'=> 'required|min:5|max:20',
        ]);

        Prodi::where('id', $prodi->id)->update($validateData);
        $request->session()->flash('info', "Data prodi $prodi->nama berhasil diubah");
        return redirect()->route('prodi.index');
    }

    public function destroy(Prodi $prodi) {
        $prodi->delete();
        return redirect()->route('prodi.index')
            ->with("info","Prodi $prodi->nama berhasil dihapus.");
    }
}
?>
