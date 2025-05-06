<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('mahasiswa')->insert([
            [
                'nim' => '1234567890',
                'nama' => 'John Doe',
                'prodi_id' => 1,
                'semester' => 7,
                'ipk' => 3.8,
                'preferensi_lokasi' => 'malang',
                'no_telp' => '081234567890',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nim' => '1234567891',
                'nama' => 'Jane Smith',
                'prodi_id' => 2,
                'semester' => 7,
                'ipk' => 3.9,
                'preferensi_lokasi' => 'malang',
                'no_telp' => '081234567891',
                'user_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nim' => '1234567892',
                'nama' => 'Michael Johnson',
                'prodi_id' => 2,
                'semester' => 7,
                'ipk' => 3.7,
                'preferensi_lokasi' => 'malang',
                'no_telp' => '081234567892',
                'user_id' => 3,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
