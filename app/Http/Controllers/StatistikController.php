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
        $dosen_count =  User::where('role', 'dosen_pembimbing')->count();
        $lowongan_count = Lowongan::count();
        $pengajuan_count = Pengajuan::count();
        $perusahaan_count = Perusahaan::count();
        $magang_count = Pengajuan::where('status', 'accepted')->count();
        $activemenu = 'statistik';
        $dosen_plot = User::where('role', 'dosen_pembimbing')->get();
        $data = array(
            'dosen_count' => $dosen_count,
            'lowongan_count' => $lowongan_count,
            'pengajuan_count' => $pengajuan_count,
            'perusahaan_count' => $perusahaan_count,
            'magang_count' => $magang_count,
            'activemenu' => $activemenu,
            'dosen' => $dosen_plot,
            
        );
         return view('admin.statistik.index',$data);
    }
}
