<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DokumenLowonganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('dokumen_lowongan')->insert([
            [
                'lowongan_id' => 1,
                'tipe' => 'CV',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'lowongan_id' => 1,
                'tipe' => 'Transkrip Nilai',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'lowongan_id' => 1,
                'tipe' => 'Sertifikat',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'lowongan_id' => 2,
                'tipe' => 'CV',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'lowongan_id' => 2,
                'tipe' => 'Transkrip Nilai',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'lowongan_id' => 2,
                'tipe' => 'Sertifikat',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
