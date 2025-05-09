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

        <!-- Nama Bidang -->
        <div class="mb-4">
            <label for="bidang" class="block text-sm font-medium text-gray-700">Skill</label>
            <select name="bidang" id="bidang" class="mt-1 block w-full p-2 border border-gray-300 rounded" required>
                <option value="" disabled selected>Pilih Bidang</option>
                @foreach ($bidang as $item)
                    <option value="{{ $item->id }}" {{ old('bidang') == $item->id ? 'selected' : '' }}>
                        {{ $item->nama_bidang }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Skill -->
        <div class="mb-4">
            <label for="skill" class="block text-sm font-medium text-gray-700">Skill</label>
            <select name="skill" id="skill" class="mt-1 block w-full p-2 border border-gray-300 rounded" required>
                <option value="" disabled selected>Pilih Skill</option>
                @foreach ($skill as $item)
                    <option value="{{ $item->id }}" {{ old('skill') == $item->id ? 'selected' : '' }}>
                        {{ $item->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Buttons -->
        <div class="flex justify-between items-center">
            <a href="{{ route('bidang_perusahaan.index') }}" class="text-blue-600 hover:underline">← Kembali</a>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Simpan</button>
        </div>
    </form>
</div>
@endsection
