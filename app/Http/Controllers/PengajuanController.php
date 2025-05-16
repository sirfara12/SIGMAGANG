<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use Illuminate\Http\Request;
use App\Models\DosenPembimbing;

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
    public function edit($id)
    {
        $activemenu = 'pengajuan';
        $dosens = DosenPembimbing::all();
        $pengajuan = Pengajuan::with(['mahasiswa.user', 'mahasiswa.prodi', 'lowongan'])->findOrFail($id);
        return view('admin.pengajuan.edit', [
            'pengajuan' => $pengajuan,
            'activemenu' => $activemenu,
            'dosens' => $dosens,
        ]);
    }
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'dosen_id' => 'required',
        ],[
            'dosen_id.required' => 'Dosen wajib diisi.',
        ]);
        try{
        $pengajuan = Pengajuan::findOrFail($id);
        $pengajuan->update([
            'dosen_id' => $request->dosen_id,
        ]);
        return redirect()->route('pengajuan.index')->with('success', 'Status berhasil diubah');
    }catch(\Exception $e){
        return redirect()->back()->withInput()->with('error', 'Gagal mengubah status.');
    }
    }

public function update(Request $request, $id)
{
    $pengajuan = Pengajuan::findOrFail($id);
    $request->validate([
        'action' => 'required|in:accept,decline',
    ]);
    if ($request->input('action') === 'accept') {
        $request->validate([
            'dosen_id' => 'required|exists:dosen_pembimbing,id',
        ], [
            'dosen_id.required' => 'Dosen wajib diisi.',
            'dosen_id.exists' => 'Dosen tidak ditemukan.',
        ]);
        $pengajuan->dosen_id = $request->dosen_id;
        $pengajuan->status = 'accepted';
    } elseif ($request->input('action') === 'decline') {
        $pengajuan->status = 'rejected';
    }

    $pengajuan->save();

    return redirect()->route('pengajuan.index')->with('success', 'Pengajuan berhasil diproses.');
}
}
