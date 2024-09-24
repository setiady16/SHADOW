<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kategori extends Model
{
    use HasFactory;

    // Nama tabel jika berbeda dari nama model (opsional, Laravel akan mengenali secara otomatis)
    protected $table = 'kategori';

    // Tentukan kolom yang dapat diisi secara massal
    protected $fillable = [
        'id', 'nama', 'deskripsi',
    ];

    // Primary key bukan auto-increment dan bertipe string
    public $incrementing = false;
    protected $keyType = 'string';

    /**
     * Relasi ke model Letter.
     * Satu kategori dapat memiliki banyak surat.
     */
    public function letters()
    {
        return $this->hasMany(Letter::class);
    }
}
