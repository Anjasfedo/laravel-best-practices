<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class Article extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'body', 'image'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getShortenedBodyAttribute(): string
    {
        // Check if body is longer than 10 characters
        if (strlen($this->attributes['body']) > 10) {
            // Trim body to 10 characters and append '...'
            return substr($this->attributes['body'], 0, 10) . '...';
        }

        // Return body as is if it's 10 characters or less
        return $this->attributes['body'];
    }

    public function getImageUrlAttribute(): ?string
    {
        if ($this->image) {
            return asset(Storage::url($this->image));
        }
        return null;
    }
}
