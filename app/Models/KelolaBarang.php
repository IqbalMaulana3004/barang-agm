<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelolaBarang extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_kelola_barang',
        'kode_barang',
        'jenis_kelola',
        'keterangan',
        'jumlah_kelola',
        'tanggal_kelola',
        'created_at',
        'updated_at',
    ];

    protected $table = 'tb_kelola_barang';
    protected $primaryKey = 'kode_kelola_barang';
    protected $keyType = 'string';
    
}
