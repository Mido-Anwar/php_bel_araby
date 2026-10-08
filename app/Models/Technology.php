<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Cache;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use App\Traits\HasRichContent;
class Technology extends Model
{
    use HasFactory, SoftDeletes, HasSlug,HasRichContent;

    protected $fillable = ['name', 'slug', 'description'];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug')
            ->usingLanguage('ar')
            ->doNotGenerateSlugsOnUpdate()
            ->preventOverwrite();
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    protected static function booted(): void
    {
        static::saved(fn (Technology $tech) => static::clearTechnologyCache($tech));
        static::deleted(fn (Technology $tech) => static::clearTechnologyCache($tech));

        static::deleting(function (Technology $tech) {
            if (! $tech->isForceDeleting()) {
                $tech->sections()->each(fn ($section) => $section->delete());
            }
        });

        static::restored(function (Technology $tech) {
            $tech->sections()->onlyTrashed()->get()->each->restore();
        });
    }

    protected static function clearTechnologyCache(Technology $technology): void
    {
        Cache::forget('technologies.all');
        Cache::forget("technologies.show.{$technology->id}");
        Cache::forget("technology.show.{$technology->slug}");
    }

    public function sections(): HasMany
    {
        return $this->hasMany(Section::class);
    }
}
