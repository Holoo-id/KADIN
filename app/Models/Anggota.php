<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;
    protected $table = 'tb_anggota';
    protected $fillable = [
        'Nama',
        'NIK',
        'kelurahan_desa',
        'tgl_lahir',
        'no_HP',
        'no_WA',
        'alamat',
        'id_alamat',
        'jenis_usaha',
        'produk',
        'jumlah_karyawan',
    ];
    public function kategori()
    {
        return $this->belongsTo(Alamat::class, 'id_alamat');
    }
}
