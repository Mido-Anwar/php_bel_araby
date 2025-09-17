<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\BuiltInFunction;

class Section extends Model
{
    /** @use HasFactory<\Database\Factories\SectionFactory> */
    use HasFactory;
    protected $fillable = ['title',  'content', 'technology_id'];
    public function technology(): BelongsTo

    {
        return $this->belongsTo(Technology::class);
    }

    public function concepts(): HasMany
    {
        return $this->hasMany(Concept::class);
    }
    public function builtinFunctions(): HasMany
    {
        return $this->hasMany(BuiltInFunction::class);
    }
}
