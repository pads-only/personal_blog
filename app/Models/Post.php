<?php

namespace App\Models;

use AlAminFirdows\LaravelEditorJs\Facades\LaravelEditorJs;
use App\Policies\PostPolicy;
use Illuminate\Database\Eloquent\Attributes\UsePolicy;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[UsePolicy(PostPolicy::class)]
class Post extends Model
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory;


    protected $fillable = ['user_id', 'title', 'slug', 'published_at', 'content', 'excerpt'];
    protected $casts = ['content' => 'array'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    //generate excerpt
    public static function generateExcerpt($content)
    {
        if (!isset($content['blocks'])) return '';

        foreach ($content['blocks'] as $block) {
            if ($block['type'] === 'paragraph') {
                return \Illuminate\Support\Str::limit(
                    trim(strip_tags($block['data']['text'] ?? '')),
                    200
                );
            }
        }
    }

    //search function
    public function scopeSearch($query, $value)
    {
        return $query->where(function ($q) use ($value) {
            $q->where('title', 'LIKE', "%{$value}%")
                ->orWhere('content', 'LIKE', "%{$value}%");
        });
    }

    public function scopeStatus($query, $status)
    {
        if (is_null($status)) return $query;

        return $query->where('status', $status);
    }

    public function status(): Attribute
    {
        return Attribute::make(
            get: fn($value) => $value === 1 ? 'published' : 'draft'
        );
    }
}
