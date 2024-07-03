<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PasienSeeder extends Seeder
{
    public function run()
    {
        DB::table('pasiens')->insert([
            ['name' => 'Budi', 'birthdate' => '1980-01-01'],
            ['name' => 'Budi', 'birthdate' => '1990-01-01'],
        ]);
    }
}
