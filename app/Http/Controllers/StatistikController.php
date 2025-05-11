<?php

namespace App\Http\Controllers;
use App\Models\Lowongan;
use App\Models\Pengajuan;
use App\Models\Perusahaan;
use App\Models\User;
use Illuminate\Http\Request;

class StatistikController extends Controller
{
    public function index(Request $request)
    {
        $user_count = User::count();
        $lowongan_count = Lowongan::count();
        $pengajuan_count = Pengajuan::count();
        $perusahaan_count = Perusahaan::count();
        $activemenu = 'statistik';
        $data = array(
            'user_count' => $user_count,
            'lowongan_count' => $lowongan_count,
            'pengajuan_count' => $pengajuan_count,
            'perusahaan_count' => $perusahaan_count,
            'activemenu' => $activemenu
            
        );
         return view('statistik.index',$data);
    }
}
