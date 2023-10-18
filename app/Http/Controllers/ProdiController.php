<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdiController extends Controller {

    public function index (){
        $kampus = "Univeristas Multi Data Palembang";
        return view('prodi.index')-> with('kampus', $kampus);
    }
}

?>
