<?php

namespace App\Http\Controllers;

use App\Models\Perusahaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PerusahaanController extends Controller
{
    public function index(Request $request)
    {
        $activemenu = 'perusahaan';

        $search = $request->input('search');
        $category = $request->input('category', 'all');

        $query = Perusahaan::query();

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%");
            });
        }

        if ($category !== 'all') {
            $query->where('bidang_perusahaan_id', $category);
        }

        $perusahaan = $query->paginate(10);
        $perusahaan->appends(['search' => $search, 'category' => $category]);

        return view('perusahaan.index', compact('perusahaan', 'search', 'category', 'activemenu'));
    }

    public function create()
    {
        return view('perusahaan.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'alamat' => 'required|string',
            'no_telp' => 'required|string|max:20',
            'email' => 'required|email|unique:perusahaan,email',
            'website' => 'nullable|url',
            'bidang_perusahaan_id' => 'required|integer',
            'foto' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('logo_perusahaan', 'public');
        }

        Perusahaan::create($validated);

        return redirect()->route('perusahaan.index')->with('success', 'Data perusahaan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $perusahaan = Perusahaan::findOrFail($id);
        return view('perusahaan.edit', compact('perusahaan'));
    }

    public function update(Request $request, $id)
    {
        $perusahaan = Perusahaan::findOrFail($id);

        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'alamat' => 'required|string',
            'no_telp' => 'required|string|max:20',
            'email' => 'required|email|unique:perusahaan,email,' . $perusahaan->id,
            'website' => 'nullable|url',
            'bidang_perusahaan_id' => 'required|integer',
            'foto' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            // hapus foto lama jika ada
            if ($perusahaan->foto) {
                Storage::disk('public')->delete($perusahaan->foto);
            }
            $validated['foto'] = $request->file('foto')->store('logo_perusahaan', 'public');
        }

        $perusahaan->update($validated);

        return redirect()->route('perusahaan.index')->with('success', 'Data perusahaan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $perusahaan = Perusahaan::findOrFail($id);
        if ($perusahaan->foto) {
            Storage::disk('public')->delete($perusahaan->foto);
        }
        $perusahaan->delete();

        return redirect()->route('perusahaan.index')->with('success', 'Data perusahaan berhasil dihapus.');
    }
}
