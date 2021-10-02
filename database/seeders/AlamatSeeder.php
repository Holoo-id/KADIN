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
        for ($i=1; $i < 11; $i++) { 
            DB::table('tb_detail_alamat')->insert([
                'id' => $i,
                'lokasi' => 'https://www.google.com/maps/',
                'kelurahan_desa' => 'Kebon Jeruk',
                'kecamatan' => 'Andir',
                'kabupaten_kota' => 'Bandung',
                'provinsi' => 'Jawa Barat',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
        for ($i=11; $i < 21; $i++) { 
            DB::table('tb_detail_alamat')->insert([
                'id' => $i,
                'lokasi' => 'https://www.google.com/maps/',
                'kelurahan_desa' => 'Cibabat',
                'kecamatan' => 'Cimahi Utara',
                'kabupaten_kota' => 'Cimahi',
                'provinsi' => 'Jawa Barat',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
