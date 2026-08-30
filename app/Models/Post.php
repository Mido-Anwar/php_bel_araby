<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


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
    protected $fillable = ['title', 'content', 'image', 'user_id', 'is_published'];

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
