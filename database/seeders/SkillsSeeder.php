<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SkillsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('skills')->insert([
            [
                'nama' => 'PHP',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nama' => 'JavaScript',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nama' => 'Python',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nama' => 'Database',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nama' => 'UI/UX Design',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
