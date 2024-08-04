<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pengajuan extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'pengajuans';

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
        'kartu',
        'proposal',
        'keterangan'
    ];
}
