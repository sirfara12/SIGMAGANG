<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use Illuminate\Http\Request;

class PengajuanController extends Controller
{
    public function index(Request $request)
    {
        $activemenu = 'pengajuan';
        $search = $request->input('search');
        $category = $request->input('category', 'all');

        $pengajuanAll = Pengajuan::all();

        $query = Pengajuan::with(['mahasiswa.user', 'mahasiswa.prodi', 'lowongan']);

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->whereHas('mahasiswa.user', function ($q1) use ($search) {
                    $q1->where('name', 'like', "%{$search}%");
                })
                    ->orWhereHas('mahasiswa.prodi', function ($q2) use ($search) {
                        $q2->where('nama', 'like', "%{$search}%");
                    })
                    ->orWhereHas('lowongan', function ($q3) use ($search) {
                        $q3->where('nama', 'like', "%{$search}%");
                    });
            });
        }

        if ($category !== 'all') {
            $query->where('status', $category);
        }
        $pengajuan = $query->paginate(10);
        $pengajuan->appends(['search' => $search, 'category' => $category]);

        return view('admin.pengajuan.index', [
            'activemenu' => $activemenu,
            'pengajuanAll' => $pengajuanAll,
            'pengajuan' => $pengajuan,
            'category' => $category,
            'search' => $search,
        ]);
    }
    public function detail($id)
    {
        $pengajuan = Pengajuan::with(['mahasiswa.user', 'mahasiswa.prodi', 'lowongan'])->findOrFail($id);
        return view('admin.pengajuan.detail', [
            'pengajuan' => $pengajuan,
        ]);
    }
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required',
            'dosen_id' => 'required',
        ],[
            'status.required' => 'Status wajib diisi.',
            'dosen_id.required' => 'Dosen wajib diisi.',
        ]);
        try{
        $pengajuan = Pengajuan::findOrFail($id);
        $pengajuan->update([
            'status' => $request->status,
            'dosen_id' => $request->dosen_id,
        ]);
        return redirect()->route('admin.pengajuan.index')->with('success', 'Status berhasil diubah');
    }catch(\Exception $e){
        return redirect()->back()->withInput()->with('error', 'Gagal mengubah status.');
    }
    }
}
