<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobListings extends Model
{
    use HasFactory;

    // Sesuaikan dengan nama tabel di migration (case-sensitive)
    protected $table = 'Job_Listings';

    // Kolom yang dapat diisi (fillable)
    protected $fillable = [
        'title',
        'description',
        'qualifications',
        'requirements',
        'status',
        'salary_min',
        'salary_max',
        'location',
        'employment_type',
        'deadline',
        'job_type_id',
    ];

    // Casting untuk kolom bertipe array dan date
    protected $casts = [
        'qualifications' => 'array',
        'requirements' => 'array',
        'deadline' => 'date',
    ];

    // Relasi ke jenis pekerjaan (JobType)
    public function jobType()
    {
        return $this->belongsTo(JobType::class, 'job_type_id');
    }

    // Relasi ke aplikasi/pelamar
    public function applications()
    {
        return $this->hasMany(Application::class, 'job_id');
    }

    // Scope: hanya pekerjaan dengan status 'active'
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    // Scope: pekerjaan yang belum melewati deadline
    public function scopeNotExpired($query)
    {
        return $query->where(function ($q) {
            $q->whereNull('deadline')
              ->orWhere('deadline', '>=', now()->toDateString());
        });
    }

    // Accessor untuk menampilkan rentang gaji dalam format rupiah
    public function getSalaryRangeAttribute()
    {
        if ($this->salary_min && $this->salary_max) {
            return 'Rp ' . number_format($this->salary_min, 0, ',', '.') .
                   ' - Rp ' . number_format($this->salary_max, 0, ',', '.');
        } elseif ($this->salary_min) {
            return 'Minimal Rp ' . number_format($this->salary_min, 0, ',', '.');
        } elseif ($this->salary_max) {
            return 'Maksimal Rp ' . number_format($this->salary_max, 0, ',', '.');
        }

        return 'Salary Negotiable';
    }

    // Accessor untuk mengetahui apakah job masih tersedia
    public function getIsAvailableAttribute()
    {
        return $this->status === 'active' &&
               ($this->deadline === null || $this->deadline >= now()->toDateString());
    }
}
