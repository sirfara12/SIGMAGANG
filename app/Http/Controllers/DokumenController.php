<?php

namespace App\Http\Controllers;

use App\Models\Dokumen;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class DokumenController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        $dokumens = Dokumen::where('pemilik_id', $user->id)
            ->where('pemilik_tipe', $user->hasRole('mahasiswa') ? 'mahasiswa' : 'dosen')
            ->get();

        return view('dokumen.index', compact('dokumens'));
    }

    public function create()
    {
        return view('dokumen.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'file' => 'required|file|max:5120', // 5MB max
            'tipe' => 'required|in:CV,Sertifikat,Surat Pengantar,Transkrip Nilai'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $file = $request->file('file');
        $path = $file->store('dokumen', 'public');

        Dokumen::create([
            'pemilik_id' => $request->user()->id,
            'pemilik_tipe' => $request->user()->hasRole('mahasiswa') ? 'mahasiswa' : 'dosen',
            'tipe' => $request->tipe,
            'file_path' => $path,
            'status' => 'pending'
        ]);

        return redirect()->route('dokumen.index')->with('success', 'Dokumen berhasil diunggah');
    }

    public function show(Dokumen $dokumen)
    {
        $this->authorize('view', $dokumen);
        return view('dokumen.show', compact('dokumen'));
    }

    public function edit(Dokumen $dokumen)
    {
        $this->authorize('update', $dokumen);
        return view('dokumen.edit', compact('dokumen'));
    }

    public function update(Request $request, Dokumen $dokumen)
    {
        $this->authorize('update', $dokumen);

        $validator = Validator::make($request->all(), [
            'file' => 'file|max:5120',
            'tipe' => 'required|in:CV,Sertifikat,Surat Pengantar,Transkrip Nilai'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if ($request->hasFile('file')) {
            Storage::disk('public')->delete($dokumen->file_path);
            $file = $request->file('file');
            $path = $file->store('dokumen', 'public');
            $dokumen->file_path = $path;
        }

        $dokumen->tipe = $request->tipe;
        $dokumen->save();

        return redirect()->route('dokumen.index')->with('success', 'Dokumen berhasil diperbarui');
    }

    public function destroy(Dokumen $dokumen)
    {
        $this->authorize('delete', $dokumen);
        Storage::disk('public')->delete($dokumen->file_path);
        $dokumen->delete();

        return redirect()->route('dokumen.index')->with('success', 'Dokumen berhasil dihapus');
    }
}
