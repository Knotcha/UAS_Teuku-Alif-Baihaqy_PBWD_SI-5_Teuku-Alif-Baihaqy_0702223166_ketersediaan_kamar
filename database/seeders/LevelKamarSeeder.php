<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LevelKamarSeeder extends Seeder
{
    public function run()
    {
        DB::table('level_kamars')->insert([
            ['name' => 'VVIP'],
            ['name' => 'VIP'],
            ['name' => 'Reguler'],
        ]);
    }
}
