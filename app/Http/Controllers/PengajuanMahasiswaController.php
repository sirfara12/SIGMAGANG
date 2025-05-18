<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Pengajuan;

class PengajuanMahasiswaController extends Controller
{
    public function index(Request $request)
{
    $search = $request->search;
    $user = Auth::user();
    $category = $request->category ?? 'all';
    $mahasiswa = $user->mahasiswa;

    $query = Pengajuan::with(['mahasiswa.user', 'lowongan'])
        ->whereHas('mahasiswa', function ($q) {
            $q->where('user_id', auth()->id());
        });

    if ($search) {
        $query->whereHas('mahasiswa.user', function ($q) use ($search) {
            $q->where('name', 'like', '%' . $search . '%');
        });
    }

    if ($category !== 'all') {
        $query->where('status', $category);
    }

    $pengajuan = $query->paginate(10);

    return view('mahasiswa.pengajuan.index', [
            'activemenu' => 'pengajuan',
            'pengajuan' => $pengajuan,
            'mahasiswa' => $mahasiswa
        ]);}

}
