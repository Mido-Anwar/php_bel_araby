<?php

namespace App\Helpers;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ImageHelper
{
    /**
     * Convert and store an uploaded image as WebP format using PHP Native GD library.
     *
     * @param UploadedFile $file The uploaded image file instance.
     * @param string $folder The destination directory inside public storage.
     * @param string|null $seoName Title or string used to build an SEO-friendly filename.
     * @param int $quality WebP compression quality (1 to 100). Default is 80.
     * @return array Contains stored file path, mime type, and calculated file size.
     */
    public static function convertAndStoreToWebp(UploadedFile $file, string $folder = 'uploads', ?string $seoName = null, int $quality = 80): array
    {
        // 1. Generate SEO-friendly filename using slugified title and current timestamp
        $slug = Str::slug($seoName ?? pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME));
        $fileName = $slug . '-' . time() . '.webp';
        $relativePath = trim($folder, '/') . '/' . $fileName;

        // 2. Load the source image using GD library based on its MIME type
        $mime = $file->getClientMimeType();
        $sourcePath = $file->getRealPath();

        $image = match ($mime) {
            'image/jpeg', 'image/jpg' => imagecreatefromjpeg($sourcePath),
            'image/png' => imagecreatefrompng($sourcePath),
            'image/webp' => imagecreatefromwebp($sourcePath),
            'image/gif' => imagecreatefromgif($sourcePath),
            default => null,
        };

        // Fallback: If image format is unsupported by GD, store original file without conversion
        if (!$image) {
            $path = $file->storeAs($folder, $fileName, 'public');
            return [
                'file_path' => $path,
                'mime_type' => $mime,
                'file_size' => $file->getSize(),
            ];
        }

        // Preserve PNG & WebP transparency layers
        imagealphablending($image, true);
        imagesavealpha($image, true);

        // 3. Convert image to WebP binary stream using output buffer
        ob_start();
        imagewebp($image, null, $quality);
        $webpContent = ob_get_clean();
        imagedestroy($image);

        // 4. Save converted WebP content to Laravel public disk
        Storage::disk('public')->put($relativePath, $webpContent);

        return [
            'file_path' => $relativePath,
            'mime_type' => 'image/webp',
            'file_size' => strlen($webpContent),
        ];
    }
}
