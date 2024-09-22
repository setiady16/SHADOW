<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneratedLetter extends Model
{
    use HasFactory;

    protected $fillable = [
        'template_id',
        'user_id',
        'content',
        'created_at',
        'updated_at',
    ];

    // Relasi ke model Template
    public function template()
    {
        return $this->belongsTo(Template::class);
    }

    // Relasi ke model User (jika diperlukan)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
