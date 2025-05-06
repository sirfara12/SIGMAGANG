<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PeriodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('periodes')->insert([
            [
                'nama' => 'Periode Magang Semester Ganjil 2025/2026',
                'mulai' => '2025-07-01',
                'selesai' => '2025-12-31',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nama' => 'Periode Magang Semester Genap 2025/2026',
                'mulai' => '2026-01-01',
                'selesai' => '2026-06-30',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
