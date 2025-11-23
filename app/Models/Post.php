<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use spatie\MediaLibrary\MediaCollections\Models\Media;

class Post extends Model implements HasMedia
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory;
    use InteractsWithMedia;
    protected $fillable = ['title', 'body'];

    // define collections and conversions
    public function registerMediaCollections(): void
    {
        // collection for multiple images
        $this->addMediaCollection('images')
            ->useDisk('public'); // optional: choose disk from config/filesystems.php

        // collection for a single featured image
        $this->addMediaCollection('featured_image')
            ->singleFile()
            ->useDisk('public');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        // small thumb
        $this->addMediaConversion('thumb')
            ->width(200)
            ->height(200)
            ->sharpen(10)
            ->performOnCollections('images', 'featured_image');

        // medium conversion
        $this->addMediaConversion('medium')
            ->width(800)
            ->keepOriginalImageFormat()
            ->performOnCollections('images', 'featured_image');
    }
    // كل Post بيتبع User واحد
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
