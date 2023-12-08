<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_barang',
        'nama_barang',
        'merek',
        'jenis_barang',
        'stok_barang',
        'tanggal_masuk',
        'id_user'
    ];

    protected $table='tb_barang';
    protected $primaryKey = 'kode_barang';
    protected $keyType = 'string';
    public $timestamps = false;
}
