<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DosenPembimbingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('dosen_pembimbing')->insert([
            [
                'nama' => 'Dr. Ahmad Zaki, M.Kom',
                'nidn' => '197001011995011001',
                'email' => 'ahmad.zaki@universitas.ac.id',
                'no_telp' => '081234567890',
                'jabatan' => 'lektor',
                'user_id' => 1,
                'prodi_id' => 1,
                'preferensi_lokasi' => 'malang',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nama' => 'Dr. Siti Aisyah, M.Kom',
                'nidn' => '197503151998032002',
                'email' => 'siti.aisyah@universitas.ac.id',
                'no_telp' => '081234567891',
                'jabatan' => 'asisten_ahli',
                'user_id' => 2,
                'prodi_id' => 2,
                'preferensi_lokasi' => 'malang',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nama' => 'Dr. Budi Santoso, M.Kom',
                'nidn' => '197206201996061003',
                'email' => 'budi.santoso@universitas.ac.id',
                'no_telp' => '081234567892',
                'jabatan' => 'asisten_ahli',
                'user_id' => 3,
                'prodi_id' => 3,
                'preferensi_lokasi' => 'malang',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
