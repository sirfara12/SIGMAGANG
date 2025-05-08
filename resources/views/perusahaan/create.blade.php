@extends('layouts.app')

@section('content')
    <h2 class="text-xl font-bold mb-4">Tambah Perusahaan</h2>

    <form method="POST" action="{{ route('perusahaan.store') }}" enctype="multipart/form-data" class="space-y-4">
        @csrf

        @include('perusahaan.form')
        
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Simpan</button>
        <a href="{{ route('perusahaan.index') }}" class="text-gray-600 hover:underline">Batal</a>
    </form>
@endsection
