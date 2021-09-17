<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AlamatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i < 21; $i++) { 
            DB::table('tb_detail_alamat')->insert([
                'id' => $i,
                'lattitude' => '-6.8102063',
                'longitude' => '107.561442',
                'kelurahan_desa' => Str::random(10),
                'kecamatan' => Str::random(10),
                'kabupaten_kota' => Str::random(10),
                'provinsi' => Str::random(10),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
