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
        static::saved(function (BuiltInFunction $function) {
            static::clearFunctionCache($function);
        });

        static::deleted(function (BuiltInFunction $function) {
            static::clearFunctionCache($function);
        });
    }

    /**
     * Clear all related cache keys for this built-in function.
     */
    protected static function clearFunctionCache(BuiltInFunction $function): void
    {
        // Clear global functions list
        Cache::forget('built_in_functions.all');

        // Clear individual function cache
        Cache::forget("built_in_functions.show.{$function->id}");

        // Clear parent technology cache so newly added functions appear on technology docs/dictionary page
        Cache::forget("technologies.show.{$function->technology_id}");
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
