<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mobil extends Model
{
    protected $table = 'mobil';

    protected $fillable = [
        'nama',
        'merk',
        'tahun',
        'warna',
        'harga',
        'deskripsi',
    ];

    protected function casts(): array
    {
        return [
            'harga' => 'decimal:2',
        ];
    }
}
