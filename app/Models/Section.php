<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\BuiltInFunction;

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
    protected $fillable = ['title',  'content', 'technology_id'];

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
