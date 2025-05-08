<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JenisMagangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $activemenu = 'jenis_magang';
        $jenis_magang = JenisMagang::all();
        return view('jenis_magang.index',['activemenu' => $activemenu,'jenis_magang' => $jenis_magang]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $activemenu = 'jenis_magang';
        return view('jenis_magang.create',['activemenu' => $activemenu]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'jenis_magang' => 'required',
        ]);
        JenisMagang::create($request->all());
        return redirect()->route('jenis_magang.index')->with('success', 'Jenis Magang berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $activemenu = 'jenis_magang';
        $jenis_magang = JenisMagang::findOrFail($id);
        return view('jenis_magang.show',['activemenu' => $activemenu,'jenis_magang' => $jenis_magang]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $activemenu = 'jenis_magang';
        $jenis_magang = JenisMagang::findOrFail($id);
        return view('jenis_magang.edit',['activemenu' => $activemenu,'jenis_magang' => $jenis_magang]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'jenis_magang' => 'required',
        ]);
        $jenis_magang = JenisMagang::findOrFail($id);
        $jenis_magang->update($request->all());
        return redirect()->route('jenis_magang.index')->with('success', 'Jenis Magang berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $jenis_magang = JenisMagang::findOrFail($id);
        $jenis_magang->delete();
        return redirect()->route('jenis_magang.index')->with('success', 'Jenis Magang berhasil dihapus');
    }
}
