@extends('layouts.mahasiswa-app')

@section('content')
    <div class=" mt-24 text-center">
        <!-- Header -->
        <h1 class="text-2xl sm:text-3xl font-semibold mb-2">
            Selamat Datang,
            <span class="text-blue-600 font-bold hover:underline cursor-pointer">{{ auth()->user()->name }}</span> 👋
        </h1>
        <p class="text-gray-500 mb-6 text-sm sm:text-base">
            Lengkapi profilmu sekarang untuk melihat magang yang paling cocok buat kamu.
        </p>

        <!-- Button Group -->
        <div class="flex justify-center gap-4 mb-18">
            <button class="text-white bg-blue-600 hover:bg-blue-700 font-medium rounded-lg text-sm px-5 py-2.5">
                Lengkapi Profile
            </button>
            <button class="text-white bg-blue-600 hover:bg-blue-700 font-medium rounded-lg text-sm px-5 py-2.5">
                Lihat Rekomendasi
            </button>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto relative rounded-lg border border-gray-200">
            <table class="min-w-full text-sm text-left text-gray-700">
                <thead class="text-xs uppercase bg-gray-100 text-gray-700">
                    <tr>
                        <th scope="col" class="px-6 py-3">No</th>
                        <th scope="col" class="px-6 py-3">Nama</th>
                        <th scope="col" class="px-6 py-3">Lowongan</th>
                        <th scope="col" class="px-6 py-3">Status</th>
                        <th scope="col" class="px-6 py-3">Aksi</th>
                    </tr>
                </thead>
                {{-- <tbody>
                    @forelse ($user as $key => $userItem)
                        <tr class="bg-white border-b border-gray-200">
                            <td class="px-6 py-4">{{ $user->firstItem() + $key }}</td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    @if ($userItem->foto)
                                        <img src="{{ asset('images/logo/' . $userItem->foto) }}"
                                            alt="Foto {{ $userItem->name }}"
                                            class="w-10 h-10 rounded-full object-cover shrink-0">
                                    @else
                                        <img src="{{ asset('images/Profile.jpg') }}" alt="Foto Default"
                                            class="w-10 h-10 rounded-full border border-gray-200 object-cover shrink-0">
                                    @endif
                                    <div class="min-w-0">
                                        <div class="font-medium md:text-base break-words truncate md:whitespace-normal">
                                            {{ $userItem->name }}
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">{{ ucwords(str_replace('_', ' ', $userItem->role)) }}</td>
                            <td class="px-6 py-4">{{ $userItem->email }}</td>
                            <td class="px-6 py-4 space-x-2">
                                <!-- Detail -->
                                <button
                                    class="inline-flex items-center bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-700 text-sm cursor-pointer"
                                    onclick="location.href='{{ route('admin.pengguna.show', $userItem->id) }}'">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>

                                    <span class="hidden md:inline">Detail</span>
                                </button>

                                <!-- Edit -->
                                <a href="{{ route('admin.pengguna.edit', $userItem->id) }}"
                                    class="inline-flex items-center bg-orange-500 text-white px-3 py-1 rounded hover:bg-orange-700 text-sm cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M11 5H6a2 2 0 00-2 2v11.5A1.5 1.5 0 005.5 20H17a2 2 0 002-2v-5M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z" />
                                    </svg>
                                    <span class="hidden md:inline">Edit</span>
                                </a>

                                <!-- Hapus -->
                                <form action="{{ route('admin.pengguna.destroy', $userItem->id) }}" method="POST"
                                    class="inline" id="delete-form-{{ $userItem->id }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button"
                                        class="inline-flex items-center bg-red-500 text-white px-3 py-1 rounded hover:bg-red-700 text-sm cursor-pointer btn-delete"
                                        data-id="{{ $userItem->id }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                        <span class="hidden md:inline">Hapus</span>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-4 text-center text-gray-500">
                                Tidak ada pengguna ditemukan.
                            </td>
                        </tr>
                    @endforelse
                </tbody> --}}
                <tr>
                    <td colspan="5" class="px-6 py-4 text-center text-gray-500">
                        Tidak ada pengajuan ditemukan.
                    </td>
                </tr>
            </table>

            <!-- Pagination -->
            <div class="p-4">
                {{-- {{ $user->links('pagination::tailwind') }} --}}
            </div>
        </div>
    </div>
@endsection
