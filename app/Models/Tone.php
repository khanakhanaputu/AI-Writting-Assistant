<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tone extends Model
{
    protected $guarded = ['id'];
    public function promptGenerations(): HasMany
    {
        return $this->hasMany(PromptGeneration::class);
    }
}
