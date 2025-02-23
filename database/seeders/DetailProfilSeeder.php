<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DetailProfilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("detail_profile")->insert([
            'address' => 'Nganjuk',
            'nomor_tlp' => '085774831924',
            'ttl' => '2006-02-16',
            'foto'=> 'picture.png',
        ]);
}
}