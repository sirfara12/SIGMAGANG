<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class PenggunaController extends Controller
{
    public function index(Request $request)
    {
        $activemenu = 'pengguna';

        $search = $request->input('search');
        $category = $request->input('category', 'all'); 

        $query = User::query();

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            });
        }

        if ($category !== 'all') {
            $query->where('role', $category);
        }

        $user = $query->paginate(10);

        $user->appends(['search' => $search, 'category' => $category]);

        return view('pengguna.index', [
            'activemenu' => $activemenu,
            'user' => $user,
            'category' => $category, 
            'search' => $search,     
        ]);
    }

    public function create()
    {
        $activemenu = 'pengguna';
        return view('pengguna.create',['activemenu' => $activemenu]);
    }
}