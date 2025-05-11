@extends('layouts.app')

@section('content')
<div class="flex justify-between items-center mb-4">
    <h1 class="text-2xl font-bold text-gray-800">Daftar Bidang Perusahaan</h1>
    <button id="dropdownDividerButton" data-dropdown-toggle="dropdownDivider"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
            type="button" onclick="location.href='{{ url('bidang_perusahaan/create') }}'">Tambah
        </button>
    {{-- <a href="{{ route('bidang_perusahaan.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">
        Tambah
    </a> --}}
</div>

<div class="overflow-x-auto relative rounded-lg border border-gray-200">
    <table class="min-w-full text-sm text-left text-gray-700">
        <thead class="text-xs uppercase bg-gray-100 text-gray-700">
            <tr>
                <th class="px-6 py-3">No</th>
                <th class="px-6 py-3">Nama Bidang</th>
                <th class="px-6 py-3">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($bidang_perusahaan as $index => $item)
                <tr class="bg-white border-b border-gray-200">
                    <td class="px-6 py-4">{{ $index + 1 }}</td>
                    <td class="px-6 py-4">{{ $item->nama_bidang }}</td>
                    <td class="px-6 py-4">
                        <div class="flex gap-2">
                            <a href="{{ route('bidang_perusahaan.edit', $item->id) }}"
                               class="bg-orange-500 text-white px-3 py-1 rounded hover:bg-orange-700 text-sm">
                                Edit
                            </a>
                            <form action="{{ route('bidang_perusahaan.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-700 text-sm">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center px-6 py-4 text-gray-500">Tidak ada data bidang perusahaan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
