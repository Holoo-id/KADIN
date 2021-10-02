<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AnggotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i < 11; $i++) { 
            DB::table('tb_anggota')->insert([
                'NIK' => mt_rand(1000000000000000,9999999999999999),
                'Nama' => Str::random(10),
                'tgl_lahir' => Carbon::now(),
                'no_HP' => mt_rand(100000000000000,999999999999999),
                'no_WA' => mt_rand(100000000000000,999999999999999),
                'alamat' => Str::random(10),
                'id_alamat' => $i,
                'jenis_usaha' => 'Makanan',
                'produk' => Str::random(10),
                'jumlah_karyawan' => mt_rand(1,100),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
        for ($i=11; $i < 16; $i++) { 
            DB::table('tb_anggota')->insert([
                'NIK' => mt_rand(1000000000000000,9999999999999999),
                'Nama' => Str::random(10),
                'tgl_lahir' => Carbon::now(),
                'no_HP' => mt_rand(100000000000000,999999999999999),
                'no_WA' => mt_rand(100000000000000,999999999999999),
                'alamat' => Str::random(10),
                'id_alamat' => $i,
                'jenis_usaha' => 'Reseller',
                'produk' => Str::random(10),
                'jumlah_karyawan' => mt_rand(1,100),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
        for ($i=16; $i < 21; $i++) { 
            DB::table('tb_anggota')->insert([
                'NIK' => mt_rand(1000000000000000,9999999999999999),
                'Nama' => Str::random(10),
                'tgl_lahir' => Carbon::now(),
                'no_HP' => mt_rand(100000000000000,999999999999999),
                'no_WA' => mt_rand(100000000000000,999999999999999),
                'alamat' => Str::random(10),
                'id_alamat' => $i,
                'jenis_usaha' => 'Franchise',
                'produk' => Str::random(10),
                'jumlah_karyawan' => mt_rand(1,100),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }

        

    }
}
