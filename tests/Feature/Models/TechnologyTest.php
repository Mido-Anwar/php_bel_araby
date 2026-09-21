<?php

use App\Models\Technology;
use App\Models\Section;

/**
 * ============================================
 * Technology Model Tests
 * ============================================
 */

// ============================================
// Relationships
// ============================================

test('technology has many sections', function () {
    $tech = Technology::factory()->create();
    Section::factory()->count(3)->create(['technology_id' => $tech->id]);

    expect($tech->sections)->toHaveCount(3);
});

// ============================================
// Slug
// ============================================

test('technology slug is generated from name', function () {
    $tech = Technology::factory()->create([
        'name' => 'JavaScript',
        'slug' => null,
    ]);

    expect($tech->slug)->not->toBeNull();
});

// ============================================
// Soft Deletes
// ============================================

test('technology uses soft deletes', function () {
    $tech = Technology::factory()->create();
    $tech->delete();

    expect($tech->trashed())->toBeTrue()
        ->and(Technology::count())->toBe(0)
        ->and(Technology::withTrashed()->count())->toBe(1);
});

test('deleting technology cascades to sections', function () {
    $tech = Technology::factory()->create();
    Section::factory()->count(3)->create(['technology_id' => $tech->id]);

    $tech->delete();

    expect(Section::where('technology_id', $tech->id)->count())->toBe(0);
});

test('restoring technology restores sections', function () {
    $tech = Technology::factory()->create();
    Section::factory()->count(3)->create(['technology_id' => $tech->id]);

    $tech->delete();
    $tech->restore();

    expect($tech->sections()->count())->toBe(3);
});

// ============================================
// Fillable
// ============================================

test('technology has correct fillable attributes', function () {
    $tech = new Technology();
    $fillable = $tech->getFillable();

    expect($fillable)->toContain('name')
        ->and($fillable)->toContain('slug')
        ->and($fillable)->toContain('description');
});
