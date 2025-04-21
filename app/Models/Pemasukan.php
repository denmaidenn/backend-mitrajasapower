<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemasukan extends Model
{
    use HasFactory;

    protected $table = 'pemasukan';
    
    protected $fillable = [
        'tanggal',
        'nominal_pemasukan',
        'detail_pemasukan',
        'bank_dompet',
        'rekening_nomor'
    ];

    protected $casts = [
        'tanggal' => 'date',
        'nominal_pemasukan' => 'decimal:2'
    ];
} 