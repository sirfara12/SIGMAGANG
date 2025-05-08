@extends('layouts.app')

@section('content')
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold text-gray-800">Daftar Lowongan</h1>
    </div>

    <div class="flex justify-between items-center mb-4">
        <form class="flex w-full max-w-lg" method="GET" action="{{ route('lowongan.index') }}">
            <div class="flex w-full relative">
                <input type="hidden" name="category" id="selected-category" value="{{ $category }}">

                @php
                    $selectedNama = 'Semua Perusahaan';
                    if ($category !== 'all') {
                        $perusahaan = $perusahaans->firstWhere('id', (int) $category);
                        $selectedNama = $perusahaan ? $perusahaan->nama : 'Perusahaan Tidak Diketahui';
                    }
                @endphp

                <!-- Dropdown -->
                <button id="dropdown-button" type="button"
                    class="shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-gray-900 bg-gray-100 border border-gray-300 rounded-s-lg hover:bg-gray-200">
                    {{ $selectedNama }}
                    <svg class="w-2.5 h-2.5 ms-2.5" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 4 4 4-4" />
                    </svg>
                </button>

                <!-- Dropdown menu -->
                <div id="dropdown"
                    class="z-10 hidden absolute top-12 bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-44">
                    <ul class="py-2 text-sm text-gray-700">
                        <li><button type="button" data-value="all" class="category-btn w-full text-left px-4 py-2 hover:bg-gray-100">Semua Perusahaan</button></li>
                        @foreach ($perusahaans as $item)
                            <li><button type="button" data-value="{{ $item->id }}" class="category-btn w-full text-left px-4 py-2 hover:bg-gray-100">{{ $item->nama }}</button></li>
                        @endforeach
                    </ul>
                </div>

                <!-- Search -->
                <div class="relative w-full">
                    <input type="search" name="search" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-e-lg border border-gray-300" placeholder="Cari berdasarkan nama atau lokasi..." value="{{ $search ?? '' }}" />
                    <button type="submit"
                        class="absolute top-0 end-0 p-2.5 text-sm font-medium h-full text-white bg-blue-700 rounded-e-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                        <span class="sr-only">Search</span>
                    </button>
                </div>
            </div>
        </form>

        <a href="{{ route('lowongan.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">Tambah</a>
    </div>

    <div class="overflow-x-auto relative rounded-lg border border-gray-200">
        <table class="min-w-full text-sm text-left text-gray-700">
            <thead class="text-xs uppercase bg-gray-100 text-gray-700">
                <tr>
                    <th class="px-6 py-3">No</th>
                    <th class="px-6 py-3">Nama Lowongan</th>
                    <th class="px-6 py-3">Perusahaan</th>
                    <th class="px-6 py-3">Lokasi</th>
                    <th class="px-6 py-3">Batas Pendaftaran</th>
                    <th class="px-6 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($lowongan as $key => $item)
                    <tr class="bg-white border-b border-gray-200">
                        <td class="px-6 py-4">{{ $lowongan->firstItem() + $key }}</td>
                        <td class="px-6 py-4">{{ $item->nama }}</td>
                        <td class="px-6 py-4">{{ $item->perusahaan->nama ?? '-' }}</td>
                        <td class="px-6 py-4">{{ $item->lokasi }}</td>
                        <td class="px-6 py-4">{{ $item->batas_pendaftaran }}</td>
                        <td class="px-6 py-4">
                            <div class="flex gap-2 flex-wrap">
                                <a href="#" class="bg-blue-500 text-white px-3 py-1 rounded text-sm">Detail</a>
                                <a href="{{ route('lowongan.edit', $item->id) }}" class="bg-orange-500 text-white px-3 py-1 rounded text-sm">Edit</a>
                                <form action="{{ route('lowongan.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin hapus?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded text-sm">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center px-6 py-4 text-gray-500">Tidak ada data.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="p-4">{{ $lowongan->links('pagination::tailwind') }}</div>
    </div>

    <script>
        const dropdownButton = document.getElementById('dropdown-button');
        const dropdownMenu = document.getElementById('dropdown');
        const categoryButtons = document.querySelectorAll('.category-btn');
        const selectedCategoryInput = document.getElementById('selected-category');

        dropdownButton.addEventListener('click', () => {
            dropdownMenu.classList.toggle('hidden');
        });

        categoryButtons.forEach(button => {
            button.addEventListener('click', () => {
                selectedCategoryInput.value = button.getAttribute('data-value');
                dropdownButton.innerHTML = `${button.textContent.trim()}<svg class="w-2.5 h-2.5 ms-2.5" viewBox="0 0 10 6"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/></svg>`;
                dropdownMenu.classList.add('hidden');
                button.closest('form').submit();
            });
        });

        document.addEventListener('click', e => {
            if (!dropdownButton.contains(e.target) && !dropdownMenu.contains(e.target)) {
                dropdownMenu.classList.add('hidden');
            }
        });
    </script>
@endsection
