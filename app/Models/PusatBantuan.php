<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PusatBantuan extends Model
{
    use HasFactory;

    protected $table = 'pusat_bantuan';

    protected $fillable = [
        'pertanyaan',
        'jawaban',
        'kategori'
    ];
} 