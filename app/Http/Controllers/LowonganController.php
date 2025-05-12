<?php

namespace App\Http\Controllers;

use App\Models\Lowongan;
use App\Models\Perusahaan;
use App\Models\Periode;
use App\Models\Prodi;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LowonganController extends Controller
{
    public function index(Request $request)
    {
        $activemenu = 'lowongan';

        $search = $request->input('search');
        $category = $request->input('category', 'all');

        $query = Lowongan::with('perusahaan');

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%")
                    ->orWhere('lokasi', 'like', "%{$search}%");
            });
        }

        if ($category !== 'all') {
            $query->where('perusahaan_id', $category);
        }

        $lowongan = $query->paginate(10)->appends([
            'search' => $search,
            'category' => $category
        ]);

        $perusahaans = Perusahaan::all();
        return view('admin.lowongan.index', compact('activemenu', 'lowongan', 'search', 'category', 'perusahaans'));
    }

    public function create()
    {
        $activemenu = 'lowongan';
        $perusahaans = Perusahaan::all();
        $periodes = Periode::all();
        $prodis = Prodi::all();
        $skills = Skill::all();
        return view('admin.lowongan.create', compact('activemenu', 'perusahaans', 'periodes', 'prodis', 'skills'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'persyaratan' => 'nullable|string',
            'batas_pendaftaran' => 'required|date',
            'lokasi' => 'required|string',
            'jumlah_magang' => 'required|integer',
            'perusahaan_id' => 'required|exists:perusahaan,id',
            'periode_id' => 'nullable|integer',
            'prodi_id' => 'nullable|integer',
        ]);
        
        $lowongan = Lowongan::create($validated);
        
        if ($request->has('skills')) {
            $lowongan->skills()->sync($request->skills);
        }

        return redirect()->route('admin.lowongan.index')->with('success', 'Data lowongan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $activemenu = 'lowongan';
        $lowongan = Lowongan::findOrFail($id);
        $perusahaans = Perusahaan::all();
        $periodes = Periode::all();
        $prodis = Prodi::all();
        $skills = Skill::all();
        return view('admin.lowongan.edit', compact('activemenu', 'lowongan', 'perusahaans', 'periodes', 'prodis', 'skills'));
    }

    public function update(Request $request, $id)
    {
        $lowongan = Lowongan::findOrFail($id);

        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'persyaratan' => 'nullable|string',
            'batas_pendaftaran' => 'required|date',
            'lokasi' => 'required|string',
            'jumlah_magang' => 'required|integer',
            'perusahaan_id' => 'required|exists:perusahaan,id',
            'periode_id' => 'nullable|integer',
            'prodi_id' => 'nullable|integer',
        ]);

        $lowongan->update($validated);

        // Sync skills if they exist in the request
        if ($request->has('skills')) {
            $lowongan->skills()->sync($request->skills);
        }

        return redirect()->route('admin.lowongan.index')->with('success', 'Data lowongan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $lowongan = Lowongan::findOrFail($id);
        $lowongan->delete();

        return redirect()->route('admin.lowongan.index')->with('success', 'Data lowongan berhasil dihapus.');
    }
    
}
