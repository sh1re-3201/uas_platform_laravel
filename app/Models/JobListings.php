<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobListings extends Model
{
    use HasFactory;

    protected $table = 'job_listings'; // nama tabel sesuai migration

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

    protected $casts = [
        'qualifications' => 'array',
        'requirements' => 'array',
        'deadline' => 'date',
    ];

    public function jobType()
    {
        return $this->belongsTo(JobType::class, 'job_type_id');
    }

    public function applications()
    {
        return $this->hasMany(Application::class, 'job_id');
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function scopeNotExpired($query)
    {
        return $query->where(function ($q) {
            $q->whereNull('deadline')
              ->orWhere('deadline', '>=', now()->toDateString());
        });
    }

    public function getSalaryRangeAttribute()
    {
        if ($this->salary_min && $this->salary_max) {
            return 'Rp ' . number_format($this->salary_min, 0, ',', '.') . ' - Rp ' . number_format($this->salary_max, 0, ',', '.');
        } elseif ($this->salary_min) {
            return 'Minimal Rp ' . number_format($this->salary_min, 0, ',', '.');
        } elseif ($this->salary_max) {
            return 'Maksimal Rp ' . number_format($this->salary_max, 0, ',', '.');
        }

        return 'Gaji dapat dinegosiasikan';
    }

    public function getIsAvailableAttribute()
    {
        return $this->status === 'active' &&
               ($this->deadline === null || $this->deadline >= now()->toDateString());
    }
}
