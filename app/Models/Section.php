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

class Section extends Model
{
    use HasFactory, HasSlug, SoftDeletes;

    protected $fillable = ['title', 'slug', 'description', 'technology_id'];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug')
            ->usingLanguage('ar')
            ->doNotGenerateSlugsOnUpdate()
            ->preventOverwrite();
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    protected static function booted(): void
    {
        static::saved(fn (Section $section) => static::clearSectionCache($section));
        static::deleted(fn (Section $section) => static::clearSectionCache($section));

        static::deleting(function (Section $section) {
            if (! $section->isForceDeleting()) {
                $section->concepts()->each(fn ($concept) => $concept->delete());
            }
        });

        static::restored(function (Section $section) {
            $section->concepts()->onlyTrashed()->get()->each->restore();
        });
    }

    protected static function clearSectionCache(Section $section): void
    {
        Cache::forget('sections.all');
        Cache::forget("sections.show.{$section->id}");
        Cache::forget("sections.show.{$section->slug}");

        if ($section->technology) {
            Cache::forget("technology.show.{$section->technology->slug}");
        }

        foreach (['all', 'concept', 'function'] as $type) {
            Cache::forget(Concept::cacheKey($section->id, $type));
        }
    }

    public function technology(): BelongsTo
    {
        return $this->belongsTo(Technology::class);
    }

    public function concepts(): HasMany
    {
        return $this->hasMany(Concept::class);
    }
}
