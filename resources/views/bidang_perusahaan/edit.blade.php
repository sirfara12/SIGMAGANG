@extends('layouts.app')

@section('content')
    <h2 class="text-xl font-bold mb-4">Edit Bidang Perusahaan</h2>

    <form method="POST" action="{{ route('bidang_perusahaan.update', $bidang_perusahaan->id) }}" class="space-y-6 bg-white p-6 border border-gray-200 rounded-lg">
        @csrf
        @method('PUT')

        <div>
            <label for="nama_bidang" class="block text-sm font-medium text-gray-900">Nama Bidang</label>
            <input type="text" id="nama_bidang" name="nama_bidang" value="{{ old('nama_bidang', $bidang_perusahaan->nama_bidang) }}" required
                class="mt-2 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        </div>

        <div class="flex gap-4">
            <a href="{{ route('bidang_perusahaan.index') }}" class="text-sm font-semibold text-gray-700 hover:underline">Batal</a>
            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-500 text-sm font-medium">Update</button>
        </div>
    </form>
@endsection
