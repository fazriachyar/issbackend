<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'tanggal',
        'lokasi_kerja', // Menentukan lokasi kerja karyawan
        'jenis_pekerjaan', // Deskripsi singkat atau kode pekerjaan
        'jam_mulai', // Waktu mulai shift
        'jam_selesai', // Waktu selesai shift
        'istirahat_mulai', // Waktu mulai istirahat
        'istirahat_selesai', // Waktu selesai istirahat
        'status', // Seperti 'Terkonfirmasi', 'Pending', atau 'Dibatalkan'
        'catatan', // Catatan tambahan atau instruksi khusus
        // Tambahkan kolom lain yang diperlukan
    ];
}