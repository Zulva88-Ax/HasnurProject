<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelatihan extends Model
{
    use HasFactory;

    protected $fillable =[
        'nama_trainer',
        'tanggal',
        'sesi',
        'waktu',
        'topik',
    ];
}
