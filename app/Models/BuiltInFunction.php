<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
