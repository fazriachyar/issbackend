<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisPekerjaan extends Model
{
    protected $table = 'jenis_pekerjaan'; // Ganti dengan nama tabel yang sesuai
    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'nama'
    ];
}
