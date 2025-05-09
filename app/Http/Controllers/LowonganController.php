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
    public function create()
    {
        $activemenu = 'lowongan';
        return view('lowongan.create',['activemenu' => $activemenu]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'persyaratan' => 'required',
            'batas_pendaftaran' => 'required',
            'lokasi' => 'required',
            'jumlah_magang' => 'required',
            'perusahaan_id' => 'required',
            'periode_id' => 'required',
            'prodi_id' => 'required'
        ]);
        Lowongan::create([
           'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'persyaratan' => $request->persyaratan,
            'batas_pendaftaran' => $request->batas_pendaftaran,
            'lokasi' => $request->lokasi,
            'jumlah_magang' => $request->jumlah_magang,
            'perusahaan_id' => $request->perusahaan_id,
            'periode_id' => $request->periode_id,
            'prodi_id' => $request->prodi_id
        ]);
        return redirect()->route('perusahaan.index')->with('success', 'Perusahaan berhasil ditambahkan');
    }
    public function show($id)
    {
        $activemenu = 'lowongan';
        $lowongan = Lowongan::findOrFail($id);
        return view('lowongan.show',['activemenu' => $activemenu,'lowongan' => $lowongan]);
    }
    public function edit($id)
    {
        $activemenu = 'lowongan';
        $lowongan = Lowongan::findOrFail($id);
        return view('lowongan.edit',['activemenu' => $activemenu,'lowongan' => $lowongan]);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'persyaratan' => 'required',
            'batas_pendaftaran' => 'required',
            'lokasi' => 'required',
            'jumlah_magang' => 'required',
            'perusahaan_id' => 'required',
            'periode_id' => 'required',
            'prodi_id' => 'required'
        ]);
        Lowongan::update([
           'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'persyaratan' => $request->persyaratan,
            'batas_pendaftaran' => $request->batas_pendaftaran,
            'lokasi' => $request->lokasi,
            'jumlah_magang' => $request->jumlah_magang,
            'perusahaan_id' => $request->perusahaan_id,
            'periode_id' => $request->periode_id,
            'prodi_id' => $request->prodi_id
        ]);
        return redirect()->route('perusahaan.index')->with('success', 'Perusahaan berhasil diupdate');
    }
    public function destroy($id)
    {
        $lowongan = Lowongan::findOrFail($id);
        $lowongan->delete();
        return redirect()->route('lowongan.index')->with('success', 'lowongan berhasil dihapus');
    }
}
