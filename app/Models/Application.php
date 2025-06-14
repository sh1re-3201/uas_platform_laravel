<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $table = 'Applications'; // Tambahkan untuk pastikan sesuai tabel

    protected $fillable = [
        'user_id',
        'job_id',
        'cover_letter',
    ];

    // Relasi ke user (pelamar)
    public function user()
    {
        return $this->belongsTo(Users::class, 'user_id');
    }

    // Relasi ke pekerjaan
    public function job()
    {
        return $this->belongsTo(JobListing::class, 'job_id');
    }
}
