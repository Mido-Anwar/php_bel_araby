<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Collection;

class Concept extends Model
{
    use HasFactory;

    protected $fillable = [
        'section_id',
        'title',
        'slug',
        'description',
        'type',
        'syntax',
        'return_type',
    ];

    protected static function boot(): void
    {
        parent::boot();

        static::saved(function (Concept $concept) {
            $concept->clearCache();
        });

        static::deleted(function (Concept $concept) {
            $concept->clearCache();
        });
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

    public static function getCachedBySection(int $sectionId, ?string $type = null): Collection
    {
        $cacheKey = $type
            ? "section_{$sectionId}_concepts_{$type}"
            : "section_{$sectionId}_concepts_all";

        return Cache::rememberForever($cacheKey, function () use ($sectionId, $type) {
            $query = static::where('section_id', $sectionId);

            if ($type && in_array($type, ['concept', 'function'])) {
                $query->where('type', $type);
            }

            return $query->get();
        });
    }

    public function clearCache(): void
    {
        Cache::forget("section_{$this->section_id}_concepts_all");
        Cache::forget("section_{$this->section_id}_concepts_concept");
        Cache::forget("section_{$this->section_id}_concepts_function");
    }
}
