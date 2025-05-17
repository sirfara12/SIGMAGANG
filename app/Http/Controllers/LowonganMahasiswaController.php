<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LowonganMahasiswaController extends Controller
{
    public function index(){
        $activemenu='lowongan';
        return view('mahasiswa.lowongan.index',[
            'activemenu'=>$activemenu
        ]);
    }
}
