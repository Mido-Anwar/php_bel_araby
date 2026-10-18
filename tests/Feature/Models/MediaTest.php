<?php

use App\Models\Media;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;

/**
 * ============================================
 * Media Model Tests
 * ============================================
 */

test('media has correct fillable attributes', function () {
    $media = new Media();
    $fillable = $media->getFillable();

    expect($fillable)->toContain('file_path')
        ->and($fillable)->toContain('file_name')
        ->and($fillable)->toContain('alt_text')
        ->and($fillable)->toContain('mime_type')
        ->and($fillable)->toContain('file_size')
        ->and($fillable)->toContain('width')
        ->and($fillable)->toContain('height')
        ->and($fillable)->toContain('mediable_type')
        ->and($fillable)->toContain('mediable_id');
});

test('media casts attributes correctly', function () {
    $post = Post::factory()->create();

    $media = Media::create([
        'file_path'     => 'test.webp',
        'file_name'     => 'test.webp',
        'alt_text'      => 'Test image',
        'mime_type'     => 'image/webp',
        'file_size'     => '1024',
        'width'         => '800',
        'height'        => '600',
        'mediable_type' => Post::class,
        'mediable_id'   => $post->id,
    ]);

    expect($media->file_size)->toBeInt()->toBe(1024)
        ->and($media->width)->toBeInt()->toBe(800)
        ->and($media->height)->toBeInt()->toBe(600);
});

test('media belongs to mediable model', function () {
    $post = Post::factory()->create();

    $media = Media::create([
        'file_path'     => 'test.webp',
        'file_name'     => 'test.webp',
        'mediable_type' => Post::class,
        'mediable_id'   => $post->id,
    ]);

    expect($media->mediable)->toBeInstanceOf(Post::class)
        ->and($media->mediable->id)->toBe($post->id);
});

test('media generates correct url attribute', function () {
    $media = new Media(['file_path' => 'uploads/image.webp']);

    expect($media->url)->toBe(asset('storage/uploads/image.webp'));
});

test('media deletes file from disk on model deletion', function () {
    Storage::fake('public');

    $filePath = 'uploads/sample.webp';
    Storage::disk('public')->put($filePath, 'sample content');

    $post = Post::factory()->create();
    $media = Media::create([
        'file_path'     => $filePath,
        'file_name'     => 'sample.webp',
        'mediable_type' => Post::class,
        'mediable_id'   => $post->id,
    ]);

    expect(Storage::disk('public')->exists($filePath))->toBeTrue();

    $media->delete();

    expect(Storage::disk('public')->exists($filePath))->toBeFalse();
});
