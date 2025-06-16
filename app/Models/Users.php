<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Users extends Authenticatable
{
    use Notifiable, HasFactory;

    public $timestamps = false;


    protected $table = 'users';

    protected $fillable = [
        'name', 'email', 'password', 'role', 'tanggal_lahir',
        'pendidikan_terakhir', 'pengalaman_kerja', 'skills'
    ];

    protected $hidden = [
        'password',
    ];

    public function applications()
    {
        return $this->hasMany(Application::class, 'user_id');
    }
}
