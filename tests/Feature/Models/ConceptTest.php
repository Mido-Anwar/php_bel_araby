<?php

use App\Models\Concept;
use App\Models\Section;
use App\Models\Technology;

/**
 * ============================================
 * Concept Model Tests
 * ============================================
 */

// ============================================
// Relationships
// ============================================

test('concept belongs to section', function () {
    $tech = Technology::factory()->create();
    $section = Section::factory()->create(['technology_id' => $tech->id]);
    $concept = Concept::factory()->create(['section_id' => $section->id]);

    expect($concept->section)->toBeInstanceOf(Section::class)
        ->and($concept->section->id)->toBe($section->id);
});

// ============================================
// Scopes
// ============================================

test('only concepts scope returns concept type', function () {
    $tech = Technology::factory()->create();
    $section = Section::factory()->create(['technology_id' => $tech->id]);

    Concept::factory()->count(3)->create([
        'section_id' => $section->id,
        'type'       => 'concept',
    ]);
    Concept::factory()->count(2)->create([
        'section_id' => $section->id,
        'type'       => 'function',
    ]);

    expect(Concept::onlyConcepts()->count())->toBe(3);
});

test('only functions scope returns function type', function () {
    $tech = Technology::factory()->create();
    $section = Section::factory()->create(['technology_id' => $tech->id]);

    Concept::factory()->count(3)->create([
        'section_id' => $section->id,
        'type'       => 'concept',
    ]);
    Concept::factory()->count(2)->create([
        'section_id' => $section->id,
        'type'       => 'function',
    ]);

    expect(Concept::onlyFunctions()->count())->toBe(2);
});

// ============================================
// Auto-null syntax for concepts
// ============================================

test('syntax is null when type is concept', function () {
    $tech = Technology::factory()->create();
    $section = Section::factory()->create(['technology_id' => $tech->id]);

    $concept = Concept::factory()->create([
        'section_id' => $section->id,
        'type'       => 'concept',
        'syntax'     => 'some syntax',
    ]);

    expect($concept->fresh()->syntax)->toBeNull();
});

test('syntax is preserved when type is function', function () {
    $tech = Technology::factory()->create();
    $section = Section::factory()->create(['technology_id' => $tech->id]);

    $concept = Concept::factory()->create([
        'section_id'  => $section->id,
        'type'        => 'function',
        'syntax'      => 'array_map(callable $callback, array $array)',
        'return_type' => 'array',
    ]);

    expect($concept->fresh()->syntax)->not->toBeNull()
        ->and($concept->fresh()->return_type)->toBe('array');
});

// ============================================
// Soft Deletes
// ============================================

test('concept uses soft deletes', function () {
    $tech = Technology::factory()->create();
    $section = Section::factory()->create(['technology_id' => $tech->id]);
    $concept = Concept::factory()->create(['section_id' => $section->id]);

    $concept->delete();

    expect($concept->trashed())->toBeTrue()
        ->and(Concept::count())->toBe(0)
        ->and(Concept::withTrashed()->count())->toBe(1);
});

// ============================================
// Fillable
// ============================================

test('concept has correct fillable attributes', function () {
    $concept = new Concept();
    $fillable = $concept->getFillable();

    expect($fillable)->toContain('section_id')
        ->and($fillable)->toContain('title')
        ->and($fillable)->toContain('slug')
        ->and($fillable)->toContain('description')
        ->and($fillable)->toContain('type')
        ->and($fillable)->toContain('syntax')
        ->and($fillable)->toContain('return_type');
});
