<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;
    protected $table = 'tb_anggota';
    
    public function kategori()
    {
        return $this->belongsTo(Alamat::class, 'id_alamat');
    }
}
