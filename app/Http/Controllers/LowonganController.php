<?php

namespace App\Http\Controllers;

use App\Models\Lowongan;
use App\Models\Perusahaan;
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

        return view('lowongan.index', compact('activemenu', 'lowongan', 'search', 'category', 'perusahaans'));
    }

    public function create()
    {
        $activemenu = 'lowongan';
        $perusahaans = Perusahaan::all();
        return view('lowongan.create', compact('activemenu', 'perusahaans'));
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
            'foto' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('lowongan_foto', 'public');
        }

        Lowongan::create($validated);

        return redirect()->route('lowongan.index')->with('success', 'Data lowongan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $activemenu = 'lowongan';
        $lowongan = Lowongan::findOrFail($id);
        $perusahaans = Perusahaan::all();
        return view('lowongan.edit', compact('activemenu', 'lowongan', 'perusahaans'));
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
            'foto' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            if ($lowongan->foto) {
                Storage::disk('public')->delete($lowongan->foto);
            }
            $validated['foto'] = $request->file('foto')->store('lowongan_foto', 'public');
        }

        $lowongan->update($validated);

        return redirect()->route('lowongan.index')->with('success', 'Data lowongan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $lowongan = Lowongan::findOrFail($id);
        if ($lowongan->foto) {
            Storage::disk('public')->delete($lowongan->foto);
        }
        $lowongan->delete();

        return redirect()->route('lowongan.index')->with('success', 'Data lowongan berhasil dihapus.');
    }
    
}
