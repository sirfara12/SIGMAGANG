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
        $activemenu = 'bidang_perusahaan';
        $bidang_perusahaan = BidangPerusahaan::all();
        $skill = Skill::all();
        return view('bidang_perusahaan.index', [
            'activemenu' => $activemenu,
            'bidang_perusahaan' => $bidang_perusahaan,
            'skill'=> $skill
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $activemenu = 'bidang_perusahaan';
        $skill = Skill::all();
        $bidang = BidangPerusahaan::all();
        return view('bidang_perusahaan.create', [
            'activemenu' => $activemenu,
            'skill'=> $skill,
            'bidang'=> $bidang,
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
            'skill'=> 'required',
        ]);
        BidangPerusahaan::create($request->all());
        return redirect()->route('bidang_perusahaan.index')->with('success', 'Bidang Perusahaan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $activemenu = 'bidang_perusahaan';
        $bidang_perusahaan = BidangPerusahaan::findOrFail($id);
        return view('bidang_perusahaan.show', [
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
        $skill = Skill::all();
        return view('bidang_perusahaan.edit', [
            'activemenu' => $activemenu,
            'bidang_perusahaan' => $bidang_perusahaan,
            'skill' => $skill,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_bidang' => 'required',
            'skill'=> 'required',
        ]);
        $bidang_perusahaan = BidangPerusahaan::findOrFail($id);
        $bidang_perusahaan->update($request->all());
        return redirect()->route('bidang_perusahaan.index')->with('success', 'Bidang Perusahaan berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $bidang_perusahaan = BidangPerusahaan::findOrFail($id);
        $bidang_perusahaan->delete();
        return redirect()->route('bidang_perusahaan.index')->with('success', 'Bidang Perusahaan berhasil dihapus');
    }
}
