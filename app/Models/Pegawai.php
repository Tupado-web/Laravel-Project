<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;

    protected $table = 'pegawais';

    protected $fillable = [
        'nama_pegawai',
        'alamat',
        'umur',
        'tanggal_lahir',
        'jenis_kelamin',
        'jabatan',
        'gaji',
    ];

    protected $casts = [
        'tanggal_lahir' => 'date',
    ];
}
