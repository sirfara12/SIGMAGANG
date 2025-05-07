<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PerusahaanController extends Controller
{
    public function index()
    {
        $activemenu = 'perusahaan';
        return view('perusahaan.index',['activemenu' => $activemenu]);
    }
}
