<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Media;

/**
 * ============================================
 * Post Model Tests
 * ============================================
 */

beforeEach(function () {
    $this->user = User::factory()->create();
});

// ============================================
// Relationships
// ============================================

test('post belongs to a user', function () {
    $post = Post::factory()->create(['user_id' => $this->user->id]);

    expect($post->user)->toBeInstanceOf(User::class)
        ->and($post->user->id)->toBe($this->user->id);
});

test('post has morph one image', function () {
    $post = Post::factory()->create();

    Media::factory()->create([
        'mediable_id'   => $post->id,
        'mediable_type' => Post::class,
    ]);

    expect($post->image)->toBeInstanceOf(Media::class);
});

test('post has morph many gallery', function () {
    $post = Post::factory()->create();

    Media::factory()->count(3)->create([
        'mediable_id'   => $post->id,
        'mediable_type' => Post::class,
    ]);

    expect($post->gallery)->toHaveCount(3);
});

// ============================================
// Scopes
// ============================================

test('published scope returns only published posts', function () {
    Post::factory()->count(3)->create(['is_published' => true]);
    Post::factory()->count(2)->create(['is_published' => false]);

    expect(Post::published()->count())->toBe(3);
});

// ============================================
// Slug
// ============================================

test('slug is generated automatically on create', function () {
    $post = Post::factory()->create([
        'title' => 'My First Post',
        'slug'  => null,
    ]);

    expect($post->slug)->not->toBeNull()
        ->and($post->slug)->toContain('my-first-post');
});

test('slug remains unchanged on update', function () {
    $post = Post::factory()->create(['title' => 'Original Title']);
    $originalSlug = $post->slug;

    $post->update(['title' => 'New Title']);

    expect($post->fresh()->slug)->toBe($originalSlug);
});

// ============================================
// Casts
// ============================================

test('is_published is cast to boolean', function () {
    $post = Post::factory()->create(['is_published' => 1]);

    expect($post->is_published)->toBeTrue()
        ->and($post->is_published)->toBeBool();
});

// ============================================
// Auto-fill user_id
// ============================================

test('user_id is auto-filled from authenticated user', function () {
    $this->actingAs($this->user);

    $post = Post::factory()->create(['user_id' => null]);

    expect($post->user_id)->toBe($this->user->id);
});

// ============================================
// Soft Deletes
// ============================================

test('post uses soft deletes', function () {
    $post = Post::factory()->create();
    $post->delete();

    expect($post->trashed())->toBeTrue()
        ->and(Post::count())->toBe(0)
        ->and(Post::withTrashed()->count())->toBe(1);
});

test('post can be restored', function () {
    $post = Post::factory()->create();
    $post->delete();
    $post->restore();

    expect($post->trashed())->toBeFalse()
        ->and(Post::count())->toBe(1);
});

// ============================================
// Fillable
// ============================================

test('post has correct fillable attributes', function () {
    $post = new Post();
    $fillable = $post->getFillable();

    expect($fillable)->toContain('title')
        ->and($fillable)->toContain('slug')
        ->and($fillable)->toContain('content')
        ->and($fillable)->toContain('user_id')
        ->and($fillable)->toContain('is_published');
});
