<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $table = 'applications'; // disarankan pakai lowercase

    protected $fillable = [
        'user_id',
        'job_id',
        'cover_letter',
    ];

    // Relasi ke user (pelamar)
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id'); // seharusnya User, bukan Users
    }

    // Relasi ke pekerjaan
    public function job()
    {
        return $this->belongsTo(JobListings::class, 'job_id'); // pastikan model JobListings ada
    }
}
