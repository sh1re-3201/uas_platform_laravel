<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobType extends Model
{
    use HasFactory;

    protected $table = 'Job_Types';

    protected $fillable = ['type_name'];

    public function jobListings()
    {
        return $this->hasMany(JobListing::class, 'job_type_id');
    }
}
