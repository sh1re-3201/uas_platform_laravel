<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

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
        'deadline'
    ];

    protected $casts = [
        'qualifications' => 'array',
        'requirements' => 'array',
        'deadline' => 'date'
    ];

    // Scope untuk job yang aktif
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    // Scope untuk job yang belum expired
    public function scopeNotExpired($query)
    {
        return $query->where(function($q) {
            $q->whereNull('deadline')
              ->orWhere('deadline', '>=', now()->toDateString());
        });
    }

    // Accessor untuk format salary
    public function getSalaryRangeAttribute()
    {
        if ($this->salary_min && $this->salary_max) {
            return 'Rp ' . number_format($this->salary_min, 0, ',', '.') . ' - Rp ' . number_format($this->salary_max, 0, ',', '.');
        } elseif ($this->salary_min) {
            return 'Minimal Rp ' . number_format($this->salary_min, 0, ',', '.');
        } elseif ($this->salary_max) {
            return 'Maksimal Rp ' . number_format($this->salary_max, 0, ',', '.');
        }
        return 'Salary Negotiable';
    }

    // Check apakah job masih tersedia
    public function getIsAvailableAttribute()
    {
        return $this->status === 'active' && 
               ($this->deadline === null || $this->deadline >= now()->toDateString());
    }
}