<?php

namespace App\Http\Controllers;

use App\Models\Periode;
use Illuminate\Http\Request;

class PeriodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $activemenu = 'periode';
        $periode = Periode::all();
        return view('periode.index',['activemenu' => $activemenu,'periode' => $periode]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $activemenu = 'periode';
        return view('periode.create',['activemenu' => $activemenu]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'deskripsi' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required',
        ]);
        Periode::create($request->all());
        return redirect()->route('periode.index')->with('success', 'Periode berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $activemenu = 'periode';
        $periode = Periode::findOrFail($id);
        return view('periode.show',['activemenu' => $activemenu,'periode' => $periode]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $activemenu = 'periode';
        $periode = Periode::findOrFail($id);
        return view('periode.edit',['activemenu' => $activemenu,'periode' => $periode]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'deskripsi' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required',
        ]);
        $periode = Periode::findOrFail($id);
        $periode->update($request->all());
        return redirect()->route('periode.index')->with('success', 'Periode berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $periode = Periode::findOrFail($id);
        $periode->delete();
        return redirect()->route('periode.index')->with('success', 'Periode berhasil dihapus');
    }
}
