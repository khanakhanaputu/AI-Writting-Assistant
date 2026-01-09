<?php

namespace App\Models;

use App\Models\Tone;
use App\Models\User;
use App\Models\Platform;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ContentGeneration extends Model
{
    protected $fillable = [
        'user_id',
        'platform_id',
        'tone_id',
        'input_context',
        'language',
        'output_title',
        'output_description'
    ];

    // Relasi ke User
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke Platform
    public function platform(): BelongsTo
    {
        return $this->belongsTo(Platform::class);
    }

    // Relasi ke Tone
    public function tone(): BelongsTo
    {
        return $this->belongsTo(Tone::class);
    }
}
