<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

/**
 * Media model representing uploaded files and images.
 * Relates to other models using Polymorphic relations.
 *
 * @property int $id
 * @property string $file_path
 * @property string $file_name
 * @property string $mime_type
 * @property int $file_size
 * @property string $mediable_type
 * @property int $mediable_id
 * @property-read string $url
 */
class Media extends Model
{
    /** @use HasFactory<\Database\Factories\MediaFactory> */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'file_path',
        'file_name',
        'mime_type',
        'file_size',
        'mediable_type',
        'mediable_id',
    ];

    /**
     * Touch parent model updated_at timestamp on media change.
     * Triggers parent cache invalidation automatically.
     *
     * @var array
     */
    protected $touches = ['mediable'];

    // Enable automatic cache clearing after database transactions
    protected $afterCommit = true;

    // Cache invalidation and file cleanup when created, updated, or deleted
    protected static function booted(): void
    {
        static::saved(function (Media $media) {
            static::clearMediaCache($media);
        });

        static::deleted(function (Media $media) {
            static::clearMediaCache($media);

            // Delete actual file from storage disk upon model deletion
            if ($media->file_path && Storage::disk('public')->exists($media->file_path)) {
                Storage::disk('public')->delete($media->file_path);
            }
        });
    }

    /**
     * Clear all related cache keys for this media record.
     */
    protected static function clearMediaCache(Media $media): void
    {
        // Clear global media/images list
        Cache::forget('images.all');

        // Clear individual media cache
        Cache::forget("media.show.{$media->id}");
    }

    /**
     * Get the owning mediable model (Post, Technology, etc.).
     *
     * @return MorphTo
     */
    public function mediable(): MorphTo
    {
        return $this->morphTo();
    }

    /**
     * Get the fully qualified URL for the media asset.
     *
     * @return string
     */
    public function getUrlAttribute(): string
    {
        return asset('storage/' . $this->file_path);
    }
}
