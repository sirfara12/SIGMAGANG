<?php

namespace App\Http\Controllers;

use App\Models\DokumenLowongan;
use App\Models\Lowongan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DokumenLowonganController extends Controller
{
    public function index(Lowongan $lowongan)
    {
        $dokumenLowongans = DokumenLowongan::where('lowongan_id', $lowongan->id)->get();
        return view('dokumen_lowongan.index', compact('dokumenLowongans', 'lowongan'));
    }

    public function create(Lowongan $lowongan)
    {
        return view('dokumen_lowongan.create', compact('lowongan'));
    }

    public function store(Request $request, Lowongan $lowongan)
    {
        $validator = Validator::make($request->all(), [
            'tipe' => 'required|in:CV,Sertifikat,Surat Pengantar,Transkrip Nilai',
            'status' => 'required|in:required,optional,not_required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        DokumenLowongan::create([
            'lowongan_id' => $lowongan->id,
            'tipe' => $request->tipe,
            'status' => $request->status
        ]);

        return redirect()->route('dokumen_lowongan.index', $lowongan)->with('success', 'Persyaratan dokumen berhasil ditambahkan');
    }

    public function edit(Lowongan $lowongan, DokumenLowongan $dokumenLowongan)
    {
        return view('dokumen_lowongan.edit', compact('lowongan', 'dokumenLowongan'));
    }

    public function update(Request $request, Lowongan $lowongan, DokumenLowongan $dokumenLowongan)
    {
        $validator = Validator::make($request->all(), [
            'tipe' => 'required|in:CV,Sertifikat,Surat Pengantar,Transkrip Nilai',
            'status' => 'required|in:required,optional,not_required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $dokumenLowongan->tipe = $request->tipe;
        $dokumenLowongan->status = $request->status;
        $dokumenLowongan->save();

        return redirect()->route('dokumen_lowongan.index', $lowongan)->with('success', 'Persyaratan dokumen berhasil diperbarui');
    }

    public function destroy(Lowongan $lowongan, DokumenLowongan $dokumenLowongan)
    {
        $dokumenLowongan->delete();
        return redirect()->route('dokumen_lowongan.index', $lowongan)->with('success', 'Persyaratan dokumen berhasil dihapus');
    }
}
