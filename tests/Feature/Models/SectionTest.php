<?php

use App\Models\Section;
use App\Models\Technology;
use App\Models\Concept;

/**
 * ============================================
 * Section Model Tests
 * ============================================
 */

// ============================================
// Relationships
// ============================================

test('section belongs to technology', function () {
    $tech = Technology::factory()->create();
    $section = Section::factory()->create(['technology_id' => $tech->id]);

    expect($section->technology)->toBeInstanceOf(Technology::class)
        ->and($section->technology->id)->toBe($tech->id);
});

test('section has many concepts', function () {
    $section = Section::factory()->create();
    Concept::factory()->count(5)->create(['section_id' => $section->id]);

    expect($section->concepts)->toHaveCount(5);
});

// ============================================
// Soft Deletes
// ============================================

test('section uses soft deletes', function () {
    $section = Section::factory()->create();
    $section->delete();

    expect($section->trashed())->toBeTrue()
        ->and(Section::count())->toBe(0)
        ->and(Section::withTrashed()->count())->toBe(1);
});

test('deleting section cascades to concepts', function () {
    $section = Section::factory()->create();
    Concept::factory()->count(3)->create(['section_id' => $section->id]);

    $section->delete();

    expect(Concept::where('section_id', $section->id)->count())->toBe(0);
});

// ============================================
// Fillable
// ============================================

test('section has correct fillable attributes', function () {
    $section = new Section();
    $fillable = $section->getFillable();

    expect($fillable)->toContain('title')
        ->and($fillable)->toContain('slug')
        ->and($fillable)->toContain('description')
        ->and($fillable)->toContain('technology_id');
});
