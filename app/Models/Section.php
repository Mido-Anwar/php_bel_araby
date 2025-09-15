<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Section extends Model
{
    /** @use HasFactory<\Database\Factories\SectionFactory> */
    use HasFactory;

    public function technology(): BelongsTo

    {
        return $this->belongsTo(Technology::class);
    }

      public function concepts():HasMany{
      return $this->hasMany(Concept::class);
    }
        public function biultinFunctions():HasMany{
      return $this->hasMany(BuiltinFunction::class);
    }
}
