<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JenisMagangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('jenis_magangs')->insert([
            [
                'nama' => 'Magang Industri',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nama' => 'Magang Riset',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nama' => 'Magang Kewirausahaan',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nama' => 'Magang Pemerintahan',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
