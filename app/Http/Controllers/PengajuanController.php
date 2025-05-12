<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use Illuminate\Http\Request;

class PengajuanController extends Controller
{
    public function index(Request $request)
    {
        $activemenu = 'pengajuan';
        $search = $request->input('search');
        $category = $request->input('category', 'all');

        // Ambil semua data untuk keperluan lain (jika dibutuhkan di view)
        $pengajuanAll = Pengajuan::all();

        // Query dengan relasi mahasiswa -> user -> prodi dan lowongan
        $query = Pengajuan::with(['mahasiswa.user', 'mahasiswa.prodi', 'lowongan']);

        // Filtering berdasarkan pencarian
        if ($search) {
            $query->where(function ($q) use ($search) {
                // Cari nama di tabel users (melalui relasi mahasiswa)
                $q->whereHas('mahasiswa.user', function ($q1) use ($search) {
                    $q1->where('name', 'like', "%{$search}%"); // Ganti ke `name` di tabel users
                })
                    // Atau cari dari nama prodi mahasiswa
                    ->orWhereHas('mahasiswa.prodi', function ($q2) use ($search) {
                        $q2->where('nama', 'like', "%{$search}%"); // Gantilah `name` menjadi `nama`
                    })
                    // Atau cari dari nama lowongan
                    ->orWhereHas('lowongan', function ($q3) use ($search) {
                        $q3->where('nama', 'like', "%{$search}%"); // Gantilah `name` menjadi `nama`
                    });
            });
        }

        // Filter kategori status (admin, dosen, mahasiswa)
        if ($category !== 'all') {
            $query->where('status', $category);
        }

        // Pagination + kirim query param agar tidak hilang saat navigasi
        $pengajuan = $query->paginate(10);
        $pengajuan->appends(['search' => $search, 'category' => $category]);

        return view('admin.pengajuan.index', [
            'activemenu' => $activemenu,
            'pengajuanAll' => $pengajuanAll,
            'pengajuan' => $pengajuan,
            'category' => $category,
            'search' => $search,
        ]);
    }
}
