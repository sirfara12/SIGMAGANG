@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold mb-6">Tambah Perusahaan</h1>
    
    <div class="bg-white rounded-lg shadow p-6">
        <form action="{{ route('perusahaan.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <!-- Nama Perusahaan -->
                <div>
                    <label for="nama" class="block text-sm font-medium text-gray-700 mb-1">Nama Perusahaan</label>
                    <input type="text" name="nama" id="nama" placeholder="Masukkan Nama Perusahaan" required
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                
                <!-- Bidang Perusahaan -->
                <div>
                    <label for="bidang_perusahaan_id" class="block text-sm font-medium text-gray-700 mb-1">Bidang Perusahaan</label>
                    <div class="relative">
                        <select name="bidang_perusahaan_id" id="bidang_perusahaan_id" required
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 appearance-none">
                            <option value="">Pilih Bidang perusahaan</option>
                            @foreach ($bidangs as $bidang)
                                <option value="{{ $bidang->id }}">{{ $bidang->nama }}</option>
                            @endforeach
                        </select>
                        <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                            <svg class="w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Deskripsi -->
            <div class="mb-6">
                <label for="deskripsi" class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
                <textarea id="deskripsi" name="deskripsi" rows="10"></textarea>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                    <input type="email" name="email" id="email" placeholder="Masukan Email" required
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                
                <!-- Alamat -->
                <div>
                    <label for="alamat" class="block text-sm font-medium text-gray-700 mb-1">Alamat</label>
                    <input type="text" name="alamat" id="alamat" placeholder="Masukan Alamat" required
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <!-- Nomor Telepon -->
                <div>
                    <label for="no_telp" class="block text-sm font-medium text-gray-700 mb-1">Nomor Telepon</label>
                    <input type="text" name="no_telp" id="no_telp" placeholder="Masukan Nomor Telepon" required
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                
                <!-- Website (Optional) -->
                <div>
                    <label for="website" class="block text-sm font-medium text-gray-700 mb-1">Website (Opsional)</label>
                    <input type="text" name="website" id="website" placeholder="Masukan Website"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
            </div>
            
            <!-- Logo (Optional) -->
            <div class="mb-6">
                <label for="logo" class="block text-sm font-medium text-gray-700 mb-1">Logo (Opsional)</label>
                <input type="file" name="logo" id="logo" accept="image/*"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            
            <div class="flex justify-end space-x-3">
                <a href="{{ route('perusahaan.index') }}" 
                    class="px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400 transition-colors">
                    Batal
                </a>
                <button type="submit" 
                    class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition-colors">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/tinymce@6.4.2/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        tinymce.init({
            selector: '#deskripsi',
            plugins: 'lists link image table code wordcount',
            toolbar: 'undo redo | formatselect | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image table | code',
            menubar: false,
            height: 300,
            content_style: 'body { font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif; font-size: 16px; }',
        });
    });
</script>
@endpush
