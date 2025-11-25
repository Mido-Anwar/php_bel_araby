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
    protected $fillable = ['title', 'body', 'user_id'];
    
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('images')->useDisk('public');
        $this->addMediaCollection('featured_image')->singleFile()->useDisk('public');
    }
    // كل Post بيتبع User واحد
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
