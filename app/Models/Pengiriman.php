<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengiriman extends Model
{
    use HasFactory;

    protected $table = 'pengiriman';
    protected $fillable = [
        'nomor_resi',
        'dari',
        'ke',
        'latitude',
        'longitude',
        'jenis_barang',
        'tipe_pengiriman',
        'status'
    ];
} 