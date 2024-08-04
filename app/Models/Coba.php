<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coba extends Model
{
    use HasFactory;

    protected $table = 'cobas';

    protected $fillable = [
        'nik',
        'nama',
        'jenis_kelamin',
        'alamat',
        'no_hp',
        'status',
        'instansi',
        'jurusan',
        'start_date',
        'end_date',
        'surat_pengantar',
    ];
}
