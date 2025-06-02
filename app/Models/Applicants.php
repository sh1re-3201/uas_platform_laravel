<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Applicants extends Authenticatable{
    use Notifiable;

    public $timestamps = false; // <-- Add this line


    protected $table = 'applicants';

    protected $fillable = [
        'name', 'email', 'password', // customize based on your schema
    ];

    protected $hidden = [
        'password',
    ];
}
