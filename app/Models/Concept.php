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

    // cache invalidation for posts when created, updated, or deleted
    protected static function booted(): void
    {
        static::saved(fn() => Cache::forget('concepts.all'));
        static::deleted(fn() => Cache::forget('concepts.all'));

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
