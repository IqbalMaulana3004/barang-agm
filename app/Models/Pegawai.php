<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;


    protected $fillable = [
        'kode_pegawai',
        'nama_pegawai',
        'jabatan',
        'departemen',
        'alamat',
        'jenis_kelamin',
        'no_telfn',
        'id_user',
    ];
    protected $table='tb_pegawai';
    protected $primaryKey = 'kode_pegawai';
    protected $keyType = 'string';
    public $timestamps = false;
}
