@extends('layouts.app')

@section('content')
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold text-gray-800">Data Pengajuan Magang</h1>
    </div>

    <div class="flex justify-between items-center mb-4">
        <form class="flex w-full max-w-lg" method="GET" action="{{ route('pengajuan.index') }}">
            <div class="flex w-full">
                <!-- Hidden input to store selected category -->
                <input type="hidden" name="category" id="selected-category" value="{{ $category }}">

                <!-- Search input -->
                <div class="relative w-full">
                    <input type="search" id="search-dropdown" name="search"
                        class="block p-2.5 pe-12 w-full z-10 text-sm text-gray-900 bg-gray-50 border border-gray-300 rounded-[8px] focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500"
                        placeholder="Cari " value="{{ $search ?? '' }}" />
                    
                    <button type="submit"
                        class="absolute top-0 end-0 h-full px-4 text-sm font-medium text-white bg-blue-700 border-l border-blue-700 rounded-e-[8px] hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                        <span class="sr-only">Search</span>
                    </button>
                </div>
                
            </div>
            <div class="relative ml-2">
                <!-- Dropdown button -->
                <button id="dropdown-button" type="button"
                class="shrink-10 z-1 inline-flex items-center py-0 px-4 text-sm font-medium text-gray-900 bg-gray-100 border border-gray-300 rounded-[8px] hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700 dark:text-white dark:border-gray-600">
                {{ $category === 'all' ? 'Semua Periode' : ucfirst($category) }}
                <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 4 4 4-4" />
                </svg>
            </button>
        
                <!-- Dropdown menu -->
                <div id="dropdown"
                    class="z-10 hidden absolute left-0 mt-2 bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-44 dark:bg-gray-700">
                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdown-button">
                        <li><button type="button" data-value="all"
                                class="category-btn w-full text-left px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Semua Periode</button></li>
                        <li><button type="button" data-value="Genap"
                                class="category-btn w-full text-left px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Genap</button></li>
                        <li><button type="button" data-value="Ganjil"
                                class="category-btn w-full text-left px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Ganjil</button></li>
                    </ul>
                </div>
            </div>
        
            <button type="submit"
                class="inline-flex items-center ml-2 px-4 py-2 text-sm font-medium text-white bg-blue-500 rounded-[8px] hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300">
                <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2a1 1 0 01-.293.707L15 13.414V19a1 1 0 01-1.447.894l-4-2A1 1 0 019 17V13.414L3.293 6.707A1 1 0 013 6V4z" />
                </svg>
                Filter
            </button>
            </form>

            <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">
            +  Tambah
            </button>
        </div>
    
    <div class="overflow-x-auto relative rounded-lg border border-gray-200">
        <table class="min-w-full text-sm text-left text-gray-700">
            <thead class="text-xs uppercase bg-gray-100 text-gray-700">
                <tr>
                    <th scope="col" class="px-6 py-3">No</th>
                    <th scope="col" class="px-6 py-3">Nama</th>
                    <th scope="col" class="px-6 py-3">Prodi</th>
                    <th scope="col" class="px-6 py-3">Lowongan</th>
                    <th scope="col" class="px-6 py-3">Status</th>
                    <th scope="col" class="px-6 py-3">Dosen Pembimbing</th>
                    <th scope="col" class="px-6 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($pengajuan as $key => $pengajuan)
                <tr class="bg-white border-b border-gray-200">
                    <td class="px-6 py-4">{{ $key + 1 }}</td>
                    <td class="px-6 py-4">{{ $pengajuan->nama }}</td>
                    <td class="px-6 py-4">{{ $pengajuan->prodi }}</td>
                    <td class="px-6 py-4">{{ $pengajuan->lowongan }}</td>
                    <td class="px-6 py-4">{{ ucfirst($pengajuan->status) }}</td>
                    <td class="px-6 py-4">{{ $pengajuan->dosen_pembimbing ?? '-' }}</td>

                    <td class="px-6 py-4 space-x-2">
                        <!-- Detail -->
                        <button class="inline-flex items-center bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-700 text-sm cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span class="hidden md:inline">Detail</span>
                        </button>

                        <!-- Edit -->
                        <button class="inline-flex items-center bg-orange-500 text-white px-3 py-1 rounded hover:bg-orange-700 text-sm cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11.5A1.5 1.5 0 005.5 20H17a2 2 0 002-2v-5M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z" />
                            </svg>
                            <span class="hidden md:inline">Edit</span>
                        </button>

                        <!-- Hapus -->
                        <button class="inline-flex items-center bg-red-500 text-white px-3 py-1 rounded hover:bg-red-700 text-sm cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 11.7A3 3 0 0115.1 21H8.9a3 3 0 01-2.033-2.3L5 7h14z" />
                            </svg>
                            <span class="hidden md:inline">Hapus</span>
                        </button>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="px-6 py-4 text-center">Data tidak tersedia.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    {{ $pengajuan->links() }}

        <!-- Pagination -->
        <div class="p-4">
            {{ $pengajuan->links('pagination::tailwind') }}
        </div>
    </div>

    <!-- JavaScript -->
    <script>
        const dropdownButton = document.getElementById('dropdown-button');
        const dropdownMenu = document.getElementById('dropdown');
        const categoryButtons = document.querySelectorAll('.category-btn');
        const selectedCategoryInput = document.getElementById('selected-category');

        // Toggle dropdown
        dropdownButton.addEventListener('click', () => {
            dropdownMenu.classList.toggle('hidden');
        });

        // Handle category selection and submit form
        categoryButtons.forEach(button => {
            button.addEventListener('click', () => {
                const selectedValue = button.getAttribute('data-value');
                const displayText = button.textContent.trim();

                selectedCategoryInput.value = selectedValue;
                dropdownButton.innerHTML = `${displayText}
                    <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 4 4 4-4" />
                    </svg>`;

                dropdownMenu.classList.add('hidden');

                // Automatically submit the form when a category is selected
                button.closest('form').submit();
            });
        });

        // Close dropdown when clicking outside
        document.addEventListener('click', (e) => {
            if (!dropdownButton.contains(e.target) && !dropdownMenu.contains(e.target)) {
                dropdownMenu.classList.add('hidden');
            }
        });
    </script>
@endsection