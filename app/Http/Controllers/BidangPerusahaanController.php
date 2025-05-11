<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;
use App\Models\BidangPerusahaan;

class BidangPerusahaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $activemenu = 'perusahaan';
        $bidang_perusahaan = BidangPerusahaan::all();
        return view('admin.bidang_perusahaan.index', [
            'activemenu' => $activemenu,
            'bidang_perusahaan' => $bidang_perusahaan
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $activemenu = 'perusahaan';
        $bidang = BidangPerusahaan::all();
        return view('admin.bidang_perusahaan.create', [
            'activemenu' => $activemenu,
            'bidang'=> $bidang,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_bidang' => 'required',
        ]);
        BidangPerusahaan::create([
            'nama_bidang'  => $request->nama_bidang,
        ]);
        return redirect()->route('admin.bidang_perusahaan.index')->with('success', 'Bidang Perusahaan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $activemenu = 'bidang_perusahaan';
        $bidang_perusahaan = BidangPerusahaan::findOrFail($id);
        return view('admin.bidang_perusahaan.show', [
            'activemenu' => $activemenu,
            'bidang_perusahaan' => $bidang_perusahaan,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $activemenu = 'bidang_perusahaan';
        $bidang_perusahaan = BidangPerusahaan::findOrFail($id);
        return view('admin.bidang_perusahaan.edit', [
            'activemenu' => $activemenu,
            'bidang_perusahaan' => $bidang_perusahaan,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_bidang' => 'required',
        ]);
        $perusahaan = BidangPerusahaan::findOrFail($id);
        $perusahaan->update([
            'nama_bidang'  => $request->nama_bidang,
        ]);
        return redirect()->route('admin.bidang_perusahaan.index')->with('success', 'Bidang Perusahaan berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $bidang_perusahaan = BidangPerusahaan::findOrFail($id);
        $bidang_perusahaan->delete();
        return redirect()->route('admin.bidang_perusahaan.index')->with('success', 'Bidang Perusahaan berhasil dihapus');
    }
}
