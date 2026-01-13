<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PromptGeneration extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // Relasi ke Master Platform
    public function platform()
    {
        return $this->belongsTo(Platform::class);
    }

    // Relasi ke Master Tone
    public function tone()
    {
        return $this->belongsTo(Tone::class);
    }

    // Relasi ke Master Language
    public function language()
    {
        return $this->belongsTo(Language::class);
    }
}
