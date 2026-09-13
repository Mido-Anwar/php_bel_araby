<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Cache;
/**
 * Concept model representing concepts within a section.
 * Each concept belongs to a section.
 */
class Concept extends Model
{
    /** @use HasFactory<\Database\Factories\ConceptFactory> */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'description', 'section_id'];
   // Enable automatic cache clearing after database transactions
    protected $afterCommit = true;

// Cache invalidation for concepts when created, updated, or deleted
    protected static function booted(): void
    {
        static::saved(function (Concept $concept) {
            static::clearConceptCache($concept);
        });

        static::deleted(function (Concept $concept) {
            static::clearConceptCache($concept);
        });
    }

    /**
     * Clear all related cache keys for this concept.
     */
    protected static function clearConceptCache(Concept $concept): void
    {
        // Clear global concepts list if cached
        Cache::forget('concepts.all');

        // Clear parent section cache so updated concepts appear immediately on section page
        Cache::forget("sections.show.{$concept->section_id}");

        // Clear individual concept cache if requested directly
        Cache::forget("concepts.show.{$concept->id}");
    }
    /**
     * Get the section that owns the concept.
     *
     * @return BelongsTo
     */
    public function section(): BelongsTo
    {
        return $this->belongsTo(Section::class);
    }
}
