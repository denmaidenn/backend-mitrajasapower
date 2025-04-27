<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengeluaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'tanggal',
        'nominal_pengeluaran',
        'detail_pengeluaran',
        'bank_dompet',
        'rekening_nomor'
    ];

    protected $casts = [
        'tanggal' => 'date',
        'nominal_pengeluaran' => 'decimal:2'
    ];
} 