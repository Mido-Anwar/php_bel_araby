<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class Media extends Model
{
    /** @use HasFactory<\Database\Factories\MediaFactory> */
    use HasFactory;
    protected $fillable = [
        'file_path',
        'file_name',
        'mime_type',
        'file_size',
    ];
    /**
     * 
     * @var array
     */
    protected $touches = ['mediable'];

    // Enable automatic cache clearing after database transactions
    protected $afterCommit = true;

    // cache invalidation for posts when created, updated, or deleted
    protected static function booted(): void
    {
        static::saved(fn() => Cache::forget('images.all'));
        static::updated(fn() => Cache::forget('images.all'));
        static::deleted(fn() => Cache::forget('images.all'));

    }

    public function mediable()
    {
        return $this->morphTo();
    }

    public function getUrlAttribute()
    {
        return asset('storage/' . $this->file_path);
    }
}
