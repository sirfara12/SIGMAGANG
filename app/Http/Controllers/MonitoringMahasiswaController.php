<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MonitoringMahasiswaController extends Controller
{
    public function index(){
        $activemenu='monitoring';
        return view('mahasiswa.monitoring.index',[
            'activemenu'=>$activemenu
        ]);
    }
}
