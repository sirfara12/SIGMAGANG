<?php

namespace App\Http\Controllers;

use App\Models\Perusahaan;
use Illuminate\Http\Request;

class PerusahaanController extends Controller
{
    public function index(Request $request)
    {
        $activemenu = 'perusahaan';

        $search = $request->input('search');
        $category = $request->input('category', 'all'); 

        $query = Perusahaan::query();

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            });
        }

        if ($category !== 'all') {
            $query->where('bidang_perusahaan_id', $category);
        }

        $perusahaan = $query->paginate(10);

        $perusahaan->appends(['search' => $search, 'category' => $category]);

        return view('perusahaan.index', [
            'activemenu' => $activemenu,
            'perusahaan' => $perusahaan,
            'category' => $category,
            'search' => $search,
        ]);
    }
}
