<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lokasi extends Model
{
    protected $table = 'lokasi'; // Ganti dengan nama tabel yang sesuai

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'nama'
    ];
}
