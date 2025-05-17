<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PengajuanMahasiswaController extends Controller
{
    public function index(){
        $activemenu='pengajuan';
        return view('mahasiswa.pengajuan.index',[
            'activemenu'=>$activemenu
        ]);
    }
}
