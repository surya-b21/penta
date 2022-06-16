<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $table = 'mahasiswa';

    protected $fillable = [
        'id_user',
        'nim',
        'prodi'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function daftarsidang()
    {
        return $this->hasOne(DaftarSidang::class, 'id_mhs');
    }
}
