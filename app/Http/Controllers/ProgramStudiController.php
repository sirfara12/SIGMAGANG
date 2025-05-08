<?php

namespace App\Http\Controllers;
use App\Models\Prodi;
use Illuminate\Http\Request;

class ProgramStudiController extends Controller
{
    public function index(Request $request)
    {
        $activemenu = 'programstudi';

        $search = $request->input('search');
        $category = $request->input('category', 'all'); 

        $query = Prodi::query();

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('nama_prodi', 'like', "%{$search}%");
            });
        }

        if ($category !== 'all') {
            $query->where('nama_prodi', $category);
        }

        $programstudi = $query->paginate(10);

        $programstudi->appends(['search' => $search, 'category' => $category]);

        return view('programstudi.index', [
            'activemenu' => $activemenu,
            'programstudi' => $programstudi,
            'category' => $category, 
            'search' => $search,     
        ]);
    }
}
