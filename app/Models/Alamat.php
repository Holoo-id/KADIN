<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alamat extends Model
{
    use HasFactory;
    protected $table = 'tb_anggota';
    public function Anggota()
    {
        return $this->hasOne(Anggota::class, 'id_alamat');
    }
}
