@extends('layouts.app')

@section('content')
    <form>
        <div class="space-y-12">
            <h2 class="text-[28px] font-semibold text-gray-900 mb-4">Tambah Pengguna</h2>
            <div class="border-b border-gray-900/10 pb-12 p-6 bg-white border border-gray-200 rounded-lg">
                <div class="mt-4 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-3">
                        <label for="first-name" class="block text-sm/6 font-medium text-gray-900">Nama Pengguna</label>
                        <div class="mt-2">
                            <input type="text" name="first-name" id="first-name" autocomplete="given-name"
                                class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                        </div>
                    </div>

                    <div class="sm:col-span-3">
                        <label for="country" class="block text-sm/6 font-medium text-gray-900">Posisi</label>
                        <div class="mt-2 grid grid-cols-1">
                            <select id="role" name="role" autocomplete="role-name" class="col-start-1 row-start-1 w-full appearance-none rounded-md bg-white py-1.5 pr-8 pl-3 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                                <option>Admin</option>
                                <option>Dosen Pembimbing</option>
                                <option>Mahasiswa</option>
                              </select>
                        </div>
                    </div>

                    <div class="col-span-full">
                        <label for="email" class="block text-sm/6 font-medium text-gray-900">Email</label>
                        <div class="mt-2">
                            <input id="email" name="email" type="email" autocomplete="email"
                                class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                        </div>
                    </div>

                    <div class="col-span-full">
                        <label for="password" class="block text-sm/6 font-medium text-gray-900">
                            Kata Sandi
                        </label>
                        <div class="mt-2">
                            <input type="password" name="password" id="password" autocomplete="password"
                                class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                        </div>
                    </div>

                    <div class="col-span-full">
                        <label for="password_confirmation" class="block text-sm/6 font-medium text-gray-900">
                            Konfirmasi Kata Sandi
                        </label>
                        <div class="mt-2">
                            <input type="password" name="password" id="password" autocomplete="password"
                                class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                        </div>
                    </div>
                </div>
                <div class="mt-6 flex items-center justify-start gap-x-6">
                    <button type="button" class="text-sm/6 font-semibold text-gray-900 hover:text-gray-900 hover:border border-gray-900 rounded-md px-3 py-2">Batal</button>
                    <button type="submit"
                        class="bg-indigo-600 rounded-md px-3 py-2 text-sm/6 font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Simpan</button>
                </div>
            </div>
        </div>
    </form>
@endsection
