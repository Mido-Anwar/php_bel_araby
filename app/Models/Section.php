<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

use Illuminate\Support\Facades\Cache;

/**
 * Section model representing sections within a technology.
 * Each section belongs to a technology and can have multiple concepts.
 */
class Section extends Model
{
    /** @use HasFactory<\Database\Factories\SectionFactory> */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'slug','description' , 'technology_id'];
    // Enable automatic cache clearing after database transactions
    protected $afterCommit = true;



    // Cache invalidation for sections when created, updated, or deleted
    protected static function booted(): void
    {
        static::saved(function (Section $section) {
            static::clearSectionCache($section);
        });

        static::deleted(function (Section $section) {
            static::clearSectionCache($section);
        });
    }

    /**
     * Clear all related cache keys for this section.
     */
    protected static function clearSectionCache(Section $section): void
    {
        // Clear global sections list
        Cache::forget('sections.all');

        // Clear individual section cache
        Cache::forget("sections.show.{$section->id}");

        // Clear parent technology cache so updated sections reflect on the technology page
        Cache::forget("technologies.show.{$section->technology_id}");
    }
    /**
     * Get the technology that owns the section.
     *
     * @return BelongsTo
     */
    public function technology(): BelongsTo
    {
        return $this->belongsTo(Technology::class);
    }

    /**
     * Get the concepts associated with the section.
     *
     * @return HasMany
     */
    public function concepts(): HasMany
    {
        return $this->hasMany(Concept::class);
    }
}
