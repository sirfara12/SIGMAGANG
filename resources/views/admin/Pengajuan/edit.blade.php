@extends('layouts.app')

@section('content')
<div class="px-6 pt-6">
    <h1 class="text-2xl font-bold mb-6">Detail Pengajuan Magang</h1>
    <form action="{{ route('pengajuan.update', $pengajuan->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            {{-- Left Column --}}
            <div class="flex flex-col gap-6 md:col-span-1">
                {{-- Data Mahasiswa --}}
                <div class="bg-white border border-gray-200 rounded-lg p-6">
                    <h3 class="font-semibold text-lg mb-4">Data Mahasiswa</h3>
                    <div class="grid grid-cols-2 gap-y-2 text-sm">
                        <div class="font-medium">Nama</div>
                        <div>{{ $pengajuan->mahasiswa->user->name }}</div>
                        <div class="font-medium">NIM</div>
                        <div>{{ $pengajuan->mahasiswa->nim }}</div>
                        <div class="font-medium">Prodi</div>
                        <div>{{ $pengajuan->mahasiswa->prodi->nama }}</div>
                        <div class="font-medium">Semester</div>
                        <div>{{ $pengajuan->mahasiswa->semester }}</div>
                        <div class="font-medium">Email</div>
                        <div>{{ $pengajuan->mahasiswa->user->email }}</div>
                        <div class="font-medium">No Telepon</div>
                        <div>{{ $pengajuan->mahasiswa->no_telp }}</div>
                    </div>
                </div>
                {{-- Dosen Pembimbing --}}
                <div class="bg-white border border-gray-200 rounded-lg p-6">
                    <h3 class="font-semibold text-lg mb-4">Dosen Pembimbing</h3>
                    <select class="w-full rounded border border-gray-300 bg-gray-100 text-gray-500 px-3 py-2 mb-4" name="dosen_id" required>
                        <option value="">Pilih Dosen Pembimbing</option>
                        @foreach($dosens as $dosen)
                            <option value="{{ $dosen->id }}" {{ $pengajuan->dosen_id == $dosen->id ? 'selected' : '' }}>
                                {{ $dosen->user->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            {{-- Right Column --}}
            <div class="md:col-span-2">
                <div class="bg-white border border-gray-200 rounded-lg p-6 h-full flex flex-col">
                    <h3 class="font-semibold text-lg mb-4">Data Pengajuan</h3>
                    <div class="grid grid-cols-2 gap-y-2 text-sm mb-6">
                        <div>
                            <div class="font-medium">Nama Perusahaan</div>
                            <div>{{ $pengajuan->lowongan->perusahaan->nama }}</div>
                        </div>
                        <div>
                            <div class="font-medium">Posisi</div>
                            <div>{{ $pengajuan->lowongan->nama }}</div>
                        </div>
                        <div>
                            <div class="font-medium">Jenis Magang</div>
                            <div>{{ $pengajuan->lowongan->jenisMagang->jenis_magang }}</div>
                        </div>
                        <div>
                            <div class="font-medium">Posisi Tersedia</div>
                            <div>{{ $pengajuan->lowongan->jumlah_magang }} Pelamar</div>
                        </div>
                    </div>
                    <div>
                        <h4 class="font-medium mb-2">Lampiran</h4>
                        <div class="grid grid-cols-2 md:grid-cols-2 gap-4">
                            <div>
                                <div class="text-xs mb-1">File CV</div>
                                <div class="flex items-center border rounded px-2 py-1 bg-gray-50">
                                    <img src="{{ asset('img/pdf-icon.png') }}" alt="pdf" class="w-5 h-5 mr-2"> 
                                    <span class="text-gray-500 text-sm">file.pdf</span>
                                </div>
                            </div>
                            <div>
                                <div class="text-xs mb-1">File Transkrip Nilai</div>
                                <div class="flex items-center border rounded px-2 py-1 bg-gray-50">
                                    <img src="{{ asset('img/pdf-icon.png') }}" alt="pdf" class="w-5 h-5 mr-2"> 
                                    <span class="text-gray-500 text-sm">file.pdf</span>
                                </div>
                            </div>
                            <div>
                                <div class="text-xs mb-1">File Sertifikat</div>
                                <div class="flex items-center border rounded px-2 py-1 bg-gray-50">
                                    <img src="{{ asset('img/pdf-icon.png') }}" alt="pdf" class="w-5 h-5 mr-2"> 
                                    <span class="text-gray-500 text-sm">file.pdf</span>
                                </div>
                            </div>
                            <div>
                                <div class="text-xs mb-1">File Surat Pengantar</div>
                                <div class="flex items-center border rounded px-2 py-1 bg-gray-50">
                                    <img src="{{ asset('img/pdf-icon.png') }}" alt="pdf" class="w-5 h-5 mr-2"> 
                                    <span class="text-gray-500 text-sm">file.pdf</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Tombol --}}
        <div class="mt-6 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <a href="{{ route('pengajuan.index') }}"
                class="inline-block bg-blue-500 hover:bg-blue-600 text-white font-semibold rounded px-4 py-2">
                Kembali
            </a>
            <div class="flex gap-2">
                <button 
                    name="action" value="accept"
                    type="submit" 
                    class="bg-green-500 hover:bg-green-600 text-white font-semibold rounded px-4 py-2"
                    {{ $pengajuan->status == 'accepted' ? 'disabled opacity-50 cursor-not-allowed' : '' }}>
                    Accept
                </button>
                <button 
                    name="action" value="decline"
                    type="submit" 
                    class="bg-red-500 hover:bg-red-600 text-white font-semibold rounded px-4 py-2"
                    {{ $pengajuan->status == 'rejected' ? 'disabled opacity-50 cursor-not-allowed' : '' }}>
                    Decline
                </button>
            </div>
        </div>
    </form>
</div>
@endsection