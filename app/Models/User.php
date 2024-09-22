<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'username', 'email', 'password', 'role',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    // Relasi ke model Letter
    public function letters()
    {
        return $this->hasMany(Letter::class);
    }

    // Relasi ke model Template (jika diperlukan)
    public function templates()
    {
        return $this->hasMany(Template::class);
    }
}
