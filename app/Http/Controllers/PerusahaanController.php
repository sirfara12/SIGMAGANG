<?php

namespace App\Http\Controllers;

use App\Models\Perusahaan;
use App\Models\BidangPerusahaan;
use Illuminate\Http\Request;
use Storage;

class PerusahaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
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

        $perusahaan = $query->paginate(10)->appends([
            'search' => $search,
            'category' => $category
        ]);

        return view('perusahaan.index', compact('activemenu', 'perusahaan', 'search', 'category'));
    }

    public function create()
    {
        $activemenu = 'perusahaan';
        $bidangs = BidangPerusahaan::all();

        return view('perusahaan.create', compact('activemenu', 'bidangs'));
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
        $activemenu = 'perusahaan';
        $bidangs = BidangPerusahaan::all();

        return view('perusahaan.edit', compact('perusahaan', 'activemenu', 'bidangs'));
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
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $activemenu = 'perusahaan';
        return view('perusahaan.create',['activemenu' => $activemenu]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
            'email' => 'required',
            'website' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'bidang_perusahaan_id' => 'required',
        ]);
        $foto = $request->file('foto');
        $foto->store('foto', 'public');
        Perusahaan::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'email' => $request->email,
            'website' => $request->website,
            'foto' => $foto->hashName(),
            'bidang_perusahaan_id' => $request->bidang_perusahaan_id,
        ]);
        return redirect()->route('perusahaan.index')->with('success', 'Perusahaan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $activemenu = 'perusahaan';
        $perusahaan = Perusahaan::findOrFail($id);
        return view('perusahaan.show',['activemenu' => $activemenu,'perusahaan' => $perusahaan]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $activemenu = 'perusahaan';
        $perusahaan = Perusahaan::findOrFail($id);
        return view('perusahaan.edit',['activemenu' => $activemenu,'perusahaan' => $perusahaan]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
            'email' => 'required',
            'website' => 'required',
            'bidang_perusahaan_id' => 'required',
        ]);
       $perusahaan = Perusahaan::findOrFail($id);

    if ($request->hasFile('foto')) {
  
        if ($perusahaan->foto && Storage::disk('public')->exists('foto/' . $perusahaan->foto)) {
            Storage::disk('public')->delete('foto/' . $perusahaan->foto);
        }

        $foto = $request->file('foto');
        $foto->store('foto', 'public');
        $fotoName = $foto->hashName();
    } else {
        $fotoName = $perusahaan->foto; 
    }
        $perusahaan->update([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'email' => $request->email,
            'website' => $request->website,
            'foto' => $fotoName,
            'bidang_perusahaan_id' => $request->bidang_perusahaan_id,
        ]);
        return redirect()->route('perusahaan.index')->with('success', 'Perusahaan berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $perusahaan = Perusahaan::findOrFail($id);
        $perusahaan->delete();
        return redirect()->route('perusahaan.index')->with('success', 'Perusahaan berhasil dihapus');
    }
}
