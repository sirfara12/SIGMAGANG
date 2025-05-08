@extends('layouts.app')

@section('content')
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold text-gray-800">Daftar Perusahaan</h1>
    </div>

    <div class="flex justify-between items-center mb-4">
        <form class="flex w-full max-w-lg" method="GET" action="{{ route('perusahaan.index') }}">
            <div class="flex w-full">
                <input type="hidden" name="category" id="selected-category" value="{{ $category }}">

                <!-- Dropdown -->
                <button id="dropdown-button" type="button"
                    class="shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-gray-900 bg-gray-100 border border-gray-300 rounded-s-lg hover:bg-gray-200">
                    {{ $category === 'all' ? 'Semua Bidang' : ucfirst($category) }}
                    <svg class="w-2.5 h-2.5 ms-2.5" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 4 4 4-4" />
                    </svg>
                </button>

                <div id="dropdown"
                    class="z-10 hidden absolute mt-12 bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-44">
                    <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdown-button">
                        <li><button type="button" data-value="all" class="category-btn w-full text-left px-4 py-2 hover:bg-gray-100">Semua Bidang</button></li>
                        <li><button type="button" data-value="TI" class="category-btn w-full text-left px-4 py-2 hover:bg-gray-100">Teknologi Informasi</button></li>
                        <li><button type="button" data-value="SD" class="category-btn w-full text-left px-4 py-2 hover:bg-gray-100">Software Development</button></li>
                        <li><button type="button" data-value="CS" class="category-btn w-full text-left px-4 py-2 hover:bg-gray-100">Cyber Security</button></li>
                        <li><button type="button" data-value="DS" class="category-btn w-full text-left px-4 py-2 hover:bg-gray-100">Data Science</button></li>
                    </ul>
                </div>

                <!-- Search -->
                <div class="relative w-full">
                    <input type="search" name="search" class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg border border-gray-300" placeholder="Cari perusahaan berdasarkan nama atau email..." value="{{ $search ?? '' }}" />
                    <button type="submit" class="absolute top-0 end-0 p-2.5 text-sm h-full text-white bg-blue-700 rounded-e-lg border border-blue-700 hover:bg-blue-800">
                        🔍
                    </button>
                </div>
            </div>
        </form>

        <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">
            Tambah
        </button>
    </div>

    <div class="overflow-x-auto relative rounded-lg border border-gray-200">
        <table class="min-w-full text-sm text-left text-gray-700">
            <thead class="text-xs uppercase bg-gray-100 text-gray-700">
                <tr>
                    <th class="px-6 py-3">No</th>
                    <th class="px-6 py-3">Nama Perusahaan</th>
                    <th class="px-6 py-3">Alamat</th>
                    <th class="px-6 py-3">No Telp</th>
                    <th class="px-6 py-3">Email</th>
                    <th class="px-6 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($perusahaan as $key => $perusahaanItem)
                    <tr class="bg-white border-b border-gray-200">
                        <td class="px-6 py-4">{{ $perusahaan->firstItem() + $key }}</td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-2">
                                @if ($perusahaanItem->foto)
                                    <img src="{{ asset('images/logo/' . $perusahaanItem->foto) }}" alt="Logo {{ $perusahaanItem->nama }}" class="w-10 h-10 rounded-full object-cover">
                                @else
                                    <img src="{{ asset('images/Sertifikat.png') }}" alt="Logo Default" class="w-10 h-10 rounded-full border border-gray-200 object-cover">
                                @endif
                                <div class="font-medium truncate">{{ $perusahaanItem->nama }}</div>
                            </div>
                        </td>
                        <td class="px-6 py-4">{{ $perusahaanItem->alamat }}</td>
                        <td class="px-6 py-4">{{ $perusahaanItem->no_telp }}</td>
                        <td class="px-6 py-4">{{ $perusahaanItem->email }}</td>
                        <td class="px-6 py-4 space-x-2">
                            <!-- Aksi -->
                            <button class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-700 text-sm">Detail</button>
                            <button class="bg-orange-500 text-white px-3 py-1 rounded hover:bg-orange-700 text-sm">Edit</button>
                            <button class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-700 text-sm">Hapus</button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-4 text-center text-gray-500">Tidak ada perusahaan ditemukan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="p-4">
            {{ $perusahaan->links('pagination::tailwind') }}
        </div>
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
                const selectedValue = button.getAttribute('data-value');
                const displayText = button.textContent.trim();

                selectedCategoryInput.value = selectedValue;
                dropdownButton.innerHTML = `${displayText}
                    <svg class="w-2.5 h-2.5 ms-2.5" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 4 4 4-4" />
                    </svg>`;
                dropdownMenu.classList.add('hidden');
                button.closest('form').submit();
            });
        });

        document.addEventListener('click', (e) => {
            if (!dropdownButton.contains(e.target) && !dropdownMenu.contains(e.target)) {
                dropdownMenu.classList.add('hidden');
            }
        });
    </script>
@endsection
