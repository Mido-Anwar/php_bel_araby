<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Cache;

/**
 * Technology model representing programming technologies or languages.
 * Each technology can have multiple sections and built-in functions.
 *
 * @property int $id
 * @property string $name
 * @property string $description
 */
class Technology extends Model
{
    /** @use HasFactory<\Database\Factories\TechnologyFactory> */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'slug', 'description'];
    // Enable automatic cache clearing after database transactions
    protected $afterCommit = true;

    // Cache invalidation for technologies when created, updated, or deleted
    protected static function booted(): void
    {
        static::saved(function (Technology $technology) {
            static::clearTechnologyCache($technology);
        });

        static::deleted(function (Technology $technology) {
            static::clearTechnologyCache($technology);
        });
    }

    /**
     * Clear all related cache keys for this technology.
     */
    protected static function clearTechnologyCache(Technology $technology): void
    {
        // Clear global technology list (e.g. used in Navbar dropdowns)
        Cache::forget('technologies.all');

        // Clear individual technology view cache
        Cache::forget("technologies.show.{$technology->id}");
    }
    /**
     * Get the sections associated with the technology.
     *
     * @return HasMany
     */
    public function sections(): HasMany
    {
        return $this->hasMany(Section::class);
    }


}
