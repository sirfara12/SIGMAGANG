<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BidangPerusahaan;

class BidangPerusahaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $activemenu = 'bidang_perusahaan';
        $bidang_perusahaan = BidangPerusahaan::all();
        return view('bidang_perusahaan.index', [
            'activemenu' => $activemenu,
            'bidang_perusahaan' => $bidang_perusahaan,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $activemenu = 'bidang_perusahaan';
        return view('bidang_perusahaan.create', [
            'activemenu' => $activemenu,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $activemenu = 'bidang_perusahaan';
        $request->validate([
            'nama_bidang' => 'required',
        ]);
        BidangPerusahaan::create($request->all());
        return redirect()->route('bidang_perusahaan.index')->with('success', 'Bidang Perusahaan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(BidangPerusahaan $bidangperusahaan)
    {
        $activemenu = 'bidang_perusahaan';
        return view('bidang_perusahaan.show', [
            'activemenu' => $activemenu,
            'bidangperusahaan' => $bidangperusahaan,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BidangPerusahaan $bidangperusahaan)
    {
        $activemenu = 'bidang_perusahaan';
        return view('bidang_perusahaan.edit', [
            'activemenu' => $activemenu,
            'bidangperusahaan' => $bidangperusahaan,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BidangPerusahaan $bidangperusahaan)
    {
        $request->validate([
            'nama_bidang' => 'required',
        ]);
        $bidangperusahaan->update($request->all());
        return redirect()->route('bidang_perusahaan.index')->with('success', 'Bidang Perusahaan berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BidangPerusahaan $bidangperusahaan)
    {
        $bidangperusahaan->delete();
        return redirect()->route('bidang_perusahaan.index')->with('success', 'Bidang Perusahaan berhasil dihapus');
    }
}
