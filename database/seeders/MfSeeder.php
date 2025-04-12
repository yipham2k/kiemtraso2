<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MfSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $mfs = ['TOYOTA', 'MITSUBISHI', 'HONDA', 'BMW', 'HYUNDAI'];

        foreach ($mfs as $mf) {
            DB::table('mfs')->updateOrInsert(
                ['name' => $mf], 
                ['country' => 'Unknown', 'created_at' => now(), 'updated_at' => now()]
            );
            
        }
    }
}