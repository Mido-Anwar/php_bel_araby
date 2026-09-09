<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

/**
 * Post model representing blog posts or articles in the application.
 * Includes soft deletes for data preservation.
 */
class Post extends Model
{

    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory, \Illuminate\Database\Eloquent\SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'content',  'user_id', 'is_published'];

    // Enable automatic cache clearing after database transactions
    protected $afterCommit = true;

    // cache invalidation for posts when created, updated, or deleted
    protected static function booted(): void
    {
        static::saved(fn() => Cache::forget('posts.all'));
        static::updated(fn() => Cache::forget('posts.all'));
        static::deleted(fn() => Cache::forget('posts.all'));
        static::restored(fn() => Cache::forget('posts.all'));
        static::forceDeleted(fn() => Cache::forget('posts.all'));

        static::forceDeleted(function (Post $post) {
            $post->deleteAttachedImage();
        });

        static::deleting(function (Post $post) {
            if ($post->isForceDeleting()) {
                $post->deleteAttachedImage();
            }
        });
    }
    public function deleteAttachedImage(): void
    {
        if ($this->image) {
            // 1. مسح الملف الفعلي من storage/app/public
            Storage::disk('public')->delete($this->image->file_path);

            // 2. مسح السجل من جدول media
            $this->image()->delete();
        }
    }

    /**
     * Get the user that owns the post.
     * A post belongs to one user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function image()
    {
        return $this->morphOne(Media::class, 'mediable');
    }

    public function gallery()
    {
        return $this->morphMany(Media::class, 'mediable');
    }
}
