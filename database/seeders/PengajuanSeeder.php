<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PengajuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pengajuan')->insert([
            [
                'mahasiswa_id' => 1,
                'lowongan_id' => 1,
                'status' => 'pending',
                'alasan' => 'Saya sangat tertarik dengan posisi UI/UX Designer karena memiliki pengalaman dalam desain dan ingin mengembangkan kompetensi di bidang ini.',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'mahasiswa_id' => 2,
                'lowongan_id' => 2,
                'status' => 'pending',
                'alasan' => 'Saya memiliki pengalaman dalam pemrograman backend dan ingin mengembangkan skill di perusahaan profesional.',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'mahasiswa_id' => 3,
                'lowongan_id' => 3,
                'status' => 'pending',
                'alasan' => 'Saya tertarik dengan posisi Data Analyst karena memiliki minat dalam analisis data dan ingin mengembangkan karir di bidang ini.',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
