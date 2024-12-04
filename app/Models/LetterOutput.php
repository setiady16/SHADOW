<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LetterOutput extends Model
{
    use HasFactory;

    // Jika nama tabel tidak sesuai konvensi, tambahkan ini:
    protected $table = 'letter_outputs';

    // Daftar kolom yang bisa diisi secara massal
    protected $fillable = [
        'template_id',
        'letter_number',
        'date',
        'recipient',
    ];

    /**
     * Relasi ke model Template
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function template()
    {
        return $this->belongsTo(Template::class);
    }
}
