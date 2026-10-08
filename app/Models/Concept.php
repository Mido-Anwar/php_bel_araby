<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use App\Traits\HasRichContent;
class Concept extends Model
{
    use HasFactory, HasSlug, SoftDeletes,HasRichContent;

    protected $fillable = [
        'section_id',
        'title',
        'slug',
        'description',
        'type',
        'syntax',
        'return_type',
    ];

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
        static::saving(function (Concept $concept) {
            if ($concept->type === 'concept') {
                $concept->syntax = null;
                $concept->return_type = null;
            }
        });

        static::saved(fn (Concept $concept) => $concept->clearCache());
        static::deleted(fn (Concept $concept) => $concept->clearCache());
    }

    public function section(): BelongsTo
    {
        return $this->belongsTo(Section::class);
    }

    public function scopeOnlyConcepts(Builder $query): Builder
    {
        return $query->where('type', 'concept');
    }

    public function scopeOnlyFunctions(Builder $query): Builder
    {
        return $query->where('type', 'function');
    }

    public static function cacheKey(int $sectionId, string $type = 'all'): string
    {
        return "section_{$sectionId}_concepts_{$type}";
    }

    public static function getCachedBySection(int $sectionId, ?string $type = null): Collection
    {
        $key = self::cacheKey($sectionId, $type ?? 'all');

        return Cache::remember($key, 3600, function () use ($sectionId, $type) {
            $query = static::where('section_id', $sectionId);

            if ($type === 'concept') {
                $query->onlyConcepts();
            } elseif ($type === 'function') {
                $query->onlyFunctions();
            }

            return $query->get();
        });
    }

    public function clearCache(): void
    {
        foreach (['all', 'concept', 'function'] as $type) {
            Cache::forget(self::cacheKey($this->section_id, $type));
        }

        Cache::forget("sections.show.{$this->section_id}");

        if ($this->section && $this->section->technology) {
            Cache::forget("technology.show.{$this->section->technology->slug}");
        }
    }
}
