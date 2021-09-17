<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alamat extends Model
{
    use HasFactory;
    protected $table = 'tb_detail_alamat';
    protected $fillable = [
        'lattitude',
        'longitude',
        'kelurahan_desa',
        'kecamatan',
        'kabupaten_kota',
        'provinsi'
    ];
    public function Anggota()
    {
        return $this->hasOne(Anggota::class, 'id_alamat');
    }
}
