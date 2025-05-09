@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-6 rounded shadow">
    <h2 class="text-2xl font-bold mb-6 text-gray-800">Tambah Bidang Perusahaan</h2>

    @if ($errors->any())
        <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('bidang_perusahaan.store') }}" method="POST">
        @csrf

        <div>
            <label for="nama_bidang" class="block text-sm font-medium text-gray-900">Nama Bidang</label>
            <input type="text" id="nama_bidang" name="nama_bidang" required
                class="mt-2 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        </div>

        <!-- Buttons -->
        <div class="mt-6 flex items-center justify-start gap-x-6">
            <a href="{{ route('bidang_perusahaan.index') }}" class="text-sm/6 font-semibold text-gray-900 hover:text-gray-900 hover:border border-gray-900 rounded-md px-3 py-2">Batal</a>
            <button type="submit"
                class="bg-indigo-600 rounded-md px-3 py-2 text-sm/6 font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Simpan</button>
        </div>
    </form>
</div>
@endsection
