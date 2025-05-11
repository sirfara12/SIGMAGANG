<?php

namespace App\Http\Controllers;

use App\Models\JenisMagang;
use Illuminate\Http\Request;

class JenisMagangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $activemenu = 'jenismagang';

        $search = $request->input('search');
        $category = $request->input('category', 'all');

        $query = JenisMagang::query();

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('jenis_magang', 'like', "%{$search}%");
            });
        }

        if ($category !== 'all') {
            $query->where('id', $category);
        }

        $jenismagang = $query->paginate(10)->appends([
            'search' => $search,
            'category' => $category
        ]);
        $jenismagangs = JenisMagang::all();
        return view('admin.jenismagang.index', compact('activemenu', 'jenismagang', 'search', 'category','jenismagangs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $activemenu = 'jenismagang';
        return view('admin.jenismagang.create',['activemenu' => $activemenu]);
    }

    /**
     * Store a newly created resourc    e in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'jenis_magang' => 'required',
        ]);
        JenisMagang::create($request->all());
        return redirect()->route('admin.jenismagang.index')->with('success', 'Jenis Magang berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $activemenu = 'jenis_magang';
        $jenis_magang = JenisMagang::findOrFail($id);
        return view('admin.jenis_magang.show',['activemenu' => $activemenu,'jenis_magang' => $jenis_magang]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $activemenu = 'jenismagang';
        $jenismagang = JenisMagang::findOrFail($id);
        return view('admin.jenismagang.edit',['activemenu' => $activemenu,'jenismagang' => $jenismagang]);
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
        return redirect()->route('admin.jenismagang.index')->with('success', 'Jenis Magang berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $jenis_magang = JenisMagang::findOrFail($id);
        $jenis_magang->delete();
        return redirect()->route('admin.jenismagang.index')->with('success', 'Jenis Magang berhasil dihapus');
    }
}
