<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LogMingguanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('log_mingguans')->insert([
            [
                'pengajuan_id' => 1,
                'minggu' => 1,
                'ringkasan' => 'Pekan pertama magang: Briefing program, pemahaman SOP, dan mulai pembuatan wireframe UI/UX',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'pengajuan_id' => 2,
                'minggu' => 1,
                'ringkasan' => 'Pekan pertama magang: Briefing program, pemahaman SOP, dan mulai pengembangan API backend',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'pengajuan_id' => 3,
                'minggu' => 1,
                'ringkasan' => 'Pekan pertama magang: Briefing program, pemahaman SOP, dan mulai analisis data',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
