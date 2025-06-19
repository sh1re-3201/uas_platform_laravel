<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $table = 'applications';

    protected $fillable = [
        'user_id',
        'job_id',
        'application_status',
    ];

    // Relasi ke user (pelamar)
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relasi ke job listing (pekerjaan) untuk HRD
    public function job()
    {
        return $this->belongsTo(JobListings::class, 'job_id');
    }

    // Relasi alias untuk job listing digunakan di sisi user (riwayat lamaran)
    public function jobListing()
    {
        return $this->belongsTo(JobListings::class, 'job_id');
    }
}
