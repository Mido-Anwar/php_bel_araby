<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Cache;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
/**
 * Section model representing sections within a technology.
 * Each section belongs to a technology and can have multiple concepts.
 */
class Section extends Model
{
    /** @use HasFactory<\Database\Factories\SectionFactory> */
    use HasFactory,HasSlug,SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'slug', 'description', 'technology_id'];
    // Enable automatic cache clearing after database transactions
    protected $afterCommit = true;

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug')
            ->usingLanguage('ar')
            ->doNotGenerateSlugsOnUpdate()
            ->preventOverwrite();
    }

    /**
     * استخدام الـ slug في الـ Route Model Binding
     */
    public function getRouteKeyName(): string
    {
        return 'slug';
    }


    // Cache invalidation for sections when created, updated, or deleted
    protected static function booted(): void
    {
        static::saved(function (Section $section) {
            static::clearSectionCache($section);
        });

        static::deleted(function (Section $section) {
            static::clearSectionCache($section);
        });
        static::deleting(function (Section $section) {
            if (! $section->isForceDeleting()) {
                $section->concepts()->each(fn($concept) => $concept->delete());
            }
        });

        static::restoring(function (Section $section) {
            $section->concepts()->onlyTrashed()->restore();
        });
    }

    /**
     * Clear all related cache keys for this section.
     */
    protected static function clearSectionCache(Section $section): void
    {
        Cache::forget('sections.all');
        Cache::forget("sections.show.{$section->id}");
        Cache::forget("technologies.show.{$section->technology_id}");

        foreach (['all', 'concept', 'function'] as $type) {
            Cache::forget(Concept::cacheKey($section->id, $type));
        }
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
