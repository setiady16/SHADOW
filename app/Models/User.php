<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail // Jika Anda ingin mendukung verifikasi email
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'name',
        'role'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime', // Menyimpan waktu verifikasi email
    ];

    // Mutator untuk hash password sebelum menyimpan ke database
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::make($password);
    }

    // Contoh relasi (jika diperlukan)
    public function posts()
    {
        return $this->hasMany(Post::class); // Ganti Post dengan nama model yang relevan
    }

    // Metode untuk mendapatkan nama lengkap (jika perlu)
    public function fullName()
    {
        return $this->name; // Anda bisa menambahkan properti lain jika diperlukan
    }
}
