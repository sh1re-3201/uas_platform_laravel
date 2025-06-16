<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Users extends Authenticatable{
    use Notifiable;

    public $timestamps = false; // <-- Add this line

    protected $table = 'users';

    protected $fillable = [
        'name', 'email', 'password', 'role', 'tanggal_lahir',
        'pendidikan_terakhir', 'pengalaman_kerja', 'skills'
    ];

    protected $hidden = [
        'password',
    ];
}
