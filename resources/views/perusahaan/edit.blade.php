@extends('layouts.app')

@section('content')
    <h2 class="text-xl font-bold mb-4">Edit Perusahaan</h2>

    <form method="POST" action="{{ route('perusahaan.update', $perusahaan->id) }}" enctype="multipart/form-data" class="space-y-4">
        @csrf
        @method('PUT')

        @include('perusahaan.form')

        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Update</button>
        <a href="{{ route('perusahaan.index') }}" class="text-gray-600 hover:underline">Batal</a>
    </form>
@endsection
