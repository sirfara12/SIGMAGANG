@extends('layouts.app')

@section('content')
<div class="flex justify-between items-center mb-4">
    <h1 class="text-2xl font-bold text-gray-800">Tambah Jenis Magang</h1>
    <a href="{{ route('skill.index') }}" class="text-sm font-semibold text-gray-700 hover:underline">Kembali</a>
</div>

<form action="{{ route('skill.store') }}" method="POST" class="space-y-6 bg-white p-6 border border-gray-200 rounded-lg">
    @csrf

    <div>
        <label for="nama" class="block text-sm font-medium text-gray-900">Jenis Magang</label>
        <input type="text" id="nama" name="nama" required
            class="mt-2 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
    </div>

    <div class="mt-6 flex items-center justify-start gap-x-6">
        <button type="submit"
            class="bg-indigo-600 rounded-md px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Simpan</button>
        <button type="button" class="text-sm font-semibold text-gray-900 hover:text-gray-900 hover:border border-gray-900 rounded-md px-3 py-2" onclick="location.href='{{ route('skill.index') }}'">Batal</button>
    </div>
</form>
@endsection
