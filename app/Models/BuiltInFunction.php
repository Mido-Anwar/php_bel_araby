<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Cache;

/**
 * BuiltInFunction model representing built-in functions for a technology.
 * Each function belongs to a technology.
 *
 * @property int $id
 * @property string $name
 * @property string $tag_name
 * @property string $syntax
 * @property string $description
 * @property string $example
 * @property int $technology_id
 */
class BuiltInFunction extends Model
{
    /** @use HasFactory<\Database\Factories\BuiltInFunctionFactory> */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'tag_name', 'description', 'technology_id'];

    // Enable automatic cache clearing after database transactions
    protected $afterCommit = true;

    // cache invalidation for posts when created, updated, or deleted
    protected static function booted(): void
    {
        static::saved(fn() => Cache::forget('built_in_functions.all'));
        static::deleted(fn() => Cache::forget('built_in_functions.all'));
    }


    /**
     * Get the technology that owns the built-in function.
     *
     * @return BelongsTo
     */
    public function technology(): BelongsTo
    {
        return $this->belongsTo(Technology::class);
    }
}
