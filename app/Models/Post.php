<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Post extends Model
{
    use HasFactory, SoftDeletes, HasSlug;

    // ─── Cache Configuration ───
    public const CACHE_PREFIX = 'blog.posts.published.page.';
    public const CACHE_TTL    = 3600;
    public const PER_PAGE     = 12;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'user_id',
        'is_published',
    ];

    protected $casts = [
        'is_published' => 'boolean',
    ];

    /**
     * إعدادات spatie/laravel-sluggable
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug')
            ->usingLanguage('ar')
            ->doNotGenerateSlugsOnUpdate()
            ->preventOverwrite();
    }

    /**
     * استخدام الـ slug في الـ Route Model Binding
     */
    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    protected static function booted(): void
    {
        static::creating(function (Post $post) {
            if (Auth::check() && empty($post->user_id)) {
                $post->user_id = Auth::id();
            }
        });

        static::saved(fn (Post $post) => static::clearPostCache($post));
        static::deleted(fn (Post $post) => static::clearPostCache($post));
        static::restored(fn (Post $post) => static::clearPostCache($post));
        static::forceDeleted(fn (Post $post) => static::clearPostCache($post));

        static::deleting(function (Post $post) {
            if ($post->isForceDeleting()) {
                $post->deleteAttachedImage();
            }
        });
    }

    protected static function clearPostCache(Post $post): void
    {
        Cache::forget('posts.all');
        Cache::forget("posts.show.{$post->id}");

        foreach (range(1, 50) as $page) {
            Cache::forget(self::CACHE_PREFIX . $page);
        }
    }

    public function deleteAttachedImage(): void
    {
        if ($image = $this->image()->first()) {
            Storage::disk('public')->delete($image->file_path);
            $image->delete();
        }
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function image(): MorphOne
    {
        return $this->morphOne(Media::class, 'mediable');
    }

    public function gallery(): MorphMany
    {
        return $this->morphMany(Media::class, 'mediable');
    }
}
