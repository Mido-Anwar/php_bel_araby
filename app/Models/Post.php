<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Post extends Model
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory, \Illuminate\Database\Eloquent\SoftDeletes;
    protected $fillable = ['title', 'content', 'image', 'user_id','is_published'];



// post has one user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
