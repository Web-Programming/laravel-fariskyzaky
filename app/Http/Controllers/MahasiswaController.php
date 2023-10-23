<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
    */
    // public function insert()
    // {
    //     $result = DB::insert('insert into mahasiswa (npm, npm_mahasiswa, tempat_lahir, tanggal_lahir,
    //     alamat, created_at) values (?, ?, ?, ?, ?, ?', ['2226250122', 'Farisky', 'Palembang',
    //     '2004-06-21', 'Kalidoni', now()]);
    //     dump($result);
    // }

    /**
     * Show the form for creating a new resource.
     */
    public function insertElq()
    {
        //Single Assignment
     /* $mhs = new Mahasiswa();
        $mhs->nama = "Farisky Zaky";
        $mhs->npm = "2226250122";
        $mhs->tempat_lahir = "Norway";
        $mhs->tanggal_lahir = date("Y-m-d");    //Tanggal hari ini
        $mhs->save(); */



        //Mass Assignment
        $mhs = Mahasiswa::insert(
            [
                ['nama' => 'Zaky Farisky',
                'npm' => '2226250122',
                'tempat_lahir' => 'Norway',
                'tempat_lahir' => date("Y-md")
                ],
                ['nama' => 'Farisky KrucukKrucuk',
                'npm' => '2226250122',
                'tempat_lahir' => 'Denmark',
                'tempat_lahir' => date("Y-md")
                ]
            ]
        );

        dump($mhs);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
