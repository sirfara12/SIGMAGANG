<?php

namespace App\Http\Controllers;

use App\Models\Periode;
use Illuminate\Http\Request;

class PeriodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $activemenu = 'periode';

        // Capture search input and category filter (active/inactive)
        $search = $request->input('search');
        $category = $request->input('category', 'all');  // 'all' for no filter, 'active' for active periods, 'inactive' for inactive periods

        $query = Periode::query();

        // Search functionality based on 'deskripsi', 'tanggal_mulai', or 'tanggal_selesai'
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('deskripsi', 'like', "%{$search}%")
                    ->orWhere('tanggal_mulai', 'like', "%{$search}%")
                    ->orWhere('tanggal_selesai', 'like', "%{$search}%");
            });
        }

        // Handle 'category' filter for active or inactive periods based on current date
        if ($category !== 'all') {
            $today = now();  // Get today's date

            if ($category === 'Aktif') {
                $query->whereDate('tanggal_mulai', '<=', $today)
                    ->whereDate('tanggal_selesai', '>=', $today);
            } elseif ($category === 'Tidak Aktif') {
                $query->whereDate('tanggal_selesai', '<', $today)
                    ->orWhereDate('tanggal_mulai', '>', $today);
            }
        }

        // Paginate the results with 10 items per page
        $periode = $query->paginate(10);

        // Append search and category parameters for pagination
        $periode->appends(['search' => $search, 'category' => $category]);

        // Return the view with necessary data
        return view('periode.index', [
            'activemenu' => $activemenu,
            'periode' => $periode,
            'category' => $category,
            'search' => $search,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $activemenu = 'periode';
        return view('periode.create', ['activemenu' => $activemenu]);
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
        return view('periode.show', ['activemenu' => $activemenu, 'periode' => $periode]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $activemenu = 'periode';
        $periode = Periode::findOrFail($id);
        return view('periode.edit', ['activemenu' => $activemenu, 'periode' => $periode]);
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
