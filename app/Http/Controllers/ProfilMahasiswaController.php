<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfilMahasiswaController extends Controller
{
    public function index()
    {
        $activemenu='profil';
        return view('mahasiswa.profil.index',[
            'activemenu'=>$activemenu
        ]);
    }
}
