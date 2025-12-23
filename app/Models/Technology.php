<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Technology extends Model
{
    /** @use HasFactory<\Database\Factories\TechnologyFactory> */
    use HasFactory;

     protected $fillable = ['name','description'];

    public function sections():HasMany{
      return $this->hasMany(Section::class);
    }
    public function builtinFunctions(): HasMany
    {
        return $this->hasMany(BuiltInFunction::class);
    }
}
