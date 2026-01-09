<?php

namespace App\Models;

use App\Models\ContentGeneration;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Platform extends Model
{
    protected $fillable = ['platform_name', 'character_limit'];

    // Relasi: Satu platform punya banyak riwayat konten
    public function contentGenerations(): HasMany
    {
        return $this->hasMany(ContentGeneration::class);
    }
}
