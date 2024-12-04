<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    use HasFactory;

    // Menentukan kolom yang dapat diisi melalui mass assignment
    protected $fillable = [
        'name',
        'content',
    ];

    /**
     * Relasi one-to-many dengan model LetterOutput
     */
    public function letterOutputs()
    {
        return $this->hasMany(LetterOutput::class);
    }
}
