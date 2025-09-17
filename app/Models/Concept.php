<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Concept extends Model
{
    /** @use HasFactory<\Database\Factories\ConceptFactory> */
    use HasFactory;

        protected $fillable = ['name', 'syntax', 'description', 'example', 'section_id'];
    public function section(): BelongsTo

    {
        return $this->belongsTo(Section::class);
    }
}
