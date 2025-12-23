<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property string $name
 * @property string $tag_name
 * @property string $syntax
 * @property string $description
 * @property string $example
 * @property int $technology_id
 */
class BuiltInFunction extends Model
{
    /** @use HasFactory<\Database\Factories\BuiltInFunctionFactory> */
    use HasFactory;
 protected $fillable = ['name','tag_name', 'syntax', 'description', 'example', 'technology_id'];

    public function technology(): BelongsTo
    {
        return $this->belongsTo(Technology::class);
    }
}
