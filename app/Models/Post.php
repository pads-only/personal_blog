<?php

namespace App\Models;

use AlAminFirdows\LaravelEditorJs\Facades\LaravelEditorJs;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory;

    protected $fillable = ['user_id', 'title', 'slug', 'published_at', 'content'];
    protected $casts = ['content' => 'array'];

    public function getBodyAttribute()
    {
        return LaravelEditorJs::render($this->attributes['content']);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
