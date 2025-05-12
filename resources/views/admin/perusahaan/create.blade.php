@extends('layouts.app')

@section('content')
    <form method="POST" action="{{ route('perusahaan.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="space-y-12">
            <h2 class="text-[28px] font-semibold text-gray-900 mb-4">Tambah Pengguna</h2>
            <div class="border-b border-gray-900/10 pb-12 p-6 bg-white border border-gray-200 rounded-lg">
                <div class="mt-4 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    {{-- Nama --}}
                    <div class="sm:col-span-3">
                        <label for="nama" class="block text-sm/6 font-medium text-gray-900">Nama Perusahaan</label>
                        <div class="mt-2">
                            <input type="text" name="nama" id="nama" required
                                class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                        </div>
                    </div>

                    {{-- Bidang Perusahaan --}}
                    <div class="sm:col-span-3">
                        <label for="bidang_perusahaan_id" class="block text-sm/6 font-medium text-gray-900">Bidang Perusahaan</label>
                        <div class="mt-2 grid grid-cols-1">
                            <select name="bidang_perusahaan_id" id="bidang_perusahaan_id" required
                                class="col-start-1 row-start-1 w-full appearance-none rounded-md bg-white py-1.5 pr-8 pl-3 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                                <option value="">Pilih Bidang perusahaan</option>
                                @foreach ($bidangs as $bidang)
                                    <option value="{{ $bidang->id }}">{{ $bidang->nama_bidang }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    {{-- Deskripsi --}}
                    <div class="col-span-full">
                        <label for="deskripsi" class="block text-sm/6 font-medium text-gray-900">Deskripsi</label>
                        <div class="mt-2">
                            <textarea id="deskripsi" name="deskripsi" rows="4"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500">{{ old('deskripsi') }}</textarea>
                        </div>
                    </div>

                    {{-- Email --}}
                    <div class="col-span-full">
                        <label for="email" class="block text-sm/6 font-medium text-gray-900">Email</label>
                        <div class="mt-2">
                            <input id="email" name="email" type="email" required autocomplete="email"
                                class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                        </div>
                    </div>

                    {{-- Alamat --}}
                    <div class="col-span-full">
                        <label for="alamat" class="block text-sm/6 font-medium text-gray-900">Alamat</label>
                        <div class="mt-2">
                            <input type="text" name="alamat" id="alamat" required
                                class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                        </div>
                    </div>

                    {{-- No Telepon --}}
                    <div class="sm:col-span-3">
                        <label for="no_telp" class="block text-sm/6 font-medium text-gray-900">No Telepon</label>
                        <div class="mt-2">
                            <input type="text" name="no_telp" id="no_telp" required
                                class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                        </div>
                    </div>

                    {{-- Website --}}
                    <div class="sm:col-span-3">
                        <label for="website" class="block text-sm/6 font-medium text-gray-900">Link Website</label>
                        <div class="mt-2">
                            <input type="text" name="website" id="website"
                                class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                        </div>
                    </div>

                    {{-- Foto Upload --}}
                    <div class="col-span-full">
                        <label for="foto" class="block text-sm/6 font-medium text-gray-900">Unggah Foto</label>
                        <label for="foto"
                            class="flex flex-col items-center justify-center w-full mt-2 h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-gray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 20 16">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5A5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                </svg>
                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Klik untuk upload</span> atau seret dan lepas</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG atau GIF (MAX. 2MB)</p>
                            </div>
                            <input id="foto" name="foto" type="file" class="hidden" accept="image/*" />
                        </label>
                    </div>
                </div>

                {{-- Tombol --}}
                <div class="mt-6 flex items-center justify-start gap-x-6">
                    <a href="{{ route('perusahaan.index') }}"
                        class="text-sm/6 font-semibold text-gray-900 hover:text-gray-900 hover:border border-gray-900 rounded-md px-3 py-2">Batal</a>
                    <button type="submit"
                        class="bg-indigo-600 rounded-md px-3 py-2 text-sm/6 font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Simpan</button>
                </div>
            </div>
        </div>
    </form>
@endsection
