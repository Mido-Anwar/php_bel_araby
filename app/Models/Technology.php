<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Technology model representing programming technologies or languages.
 * Each technology can have multiple sections and built-in functions.
 *
 * @property int $id
 * @property string $name
 * @property string $description
 */
class Technology extends Model
{
    /** @use HasFactory<\Database\Factories\TechnologyFactory> */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name','description'];

    /**
     * Get the sections associated with the technology.
     *
     * @return HasMany
     */
    public function sections():HasMany{
      return $this->hasMany(Section::class);
    }

    /**
     * Get the built-in functions associated with the technology.
     *
     * @return HasMany
     */
    public function builtinFunctions(): HasMany
    {
        return $this->hasMany(BuiltInFunction::class);
    }
}
