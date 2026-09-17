<?php

namespace App\Helpers;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;





class ImageHelper
{
    /**
     * الحد الأقصى للأبعاد (عرض x ارتفاع)
     */
    private const MAX_WIDTH  = 1200;
    private const MAX_HEIGHT = 1200;

    /**
     * جودة WebP (أقل = أصغر = أسرع للتحميل)
     */
    private const QUALITY = 70;

    /**
     * تحويل الصورة إلى WebP مع ضغط و resize للويب.
     *
     * @return array{file_path: string, mime_type: string, file_size: int, width: int, height: int}
     */
    public static function convertAndStoreToWebp(
        UploadedFile $file,
        string $folder = 'uploads',
        ?string $seoName = null,
        int $quality = self::QUALITY,
        int $maxWidth = self::MAX_WIDTH,
        int $maxHeight = self::MAX_HEIGHT,
    ): array {
        // 1. اسم ملف فريد
        $slug = Str::slug($seoName ?? pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME))
            ?: 'image';
        $fileName = $slug . '-' . uniqid() . '.webp';
        $relativePath = trim($folder, '/') . '/' . $fileName;

        // 2. تحميل الصورة
        $mime = $file->getClientMimeType();
        $sourcePath = $file->getRealPath();

        $image = match ($mime) {
            'image/jpeg', 'image/jpg' => imagecreatefromjpeg($sourcePath),
            'image/png'                => imagecreatefrompng($sourcePath),
            'image/webp'               => imagecreatefromwebp($sourcePath),
            'image/gif'                => imagecreatefromgif($sourcePath),
            default                    => null,
        };

        // 3. Fallback للصيغ غير المدعومة
        if (! $image) {
            $path = $file->storeAs($folder, $fileName, 'public');
            return [
                'file_path' => $path,
                'mime_type' => $mime,
                'file_size' => $file->getSize(),
                'width'     => 0,
                'height'    => 0,
            ];
        }

        // 4. الحصول على الأبعاد الأصلية
        $origWidth  = imagesx($image);
        $origHeight = imagesy($image);

        // 5. حساب الأبعاد الجديدة (مع الحفاظ على النسبة)
        [$newWidth, $newHeight] = self::calculateDimensions(
            $origWidth,
            $origHeight,
            $maxWidth,
            $maxHeight
        );

        // 6. Resize (لو محتاج)
        if ($newWidth !== $origWidth || $newHeight !== $origHeight) {
            $resized = imagecreatetruecolor($newWidth, $newHeight);

            // الحفاظ على transparency
            imagealphablending($resized, false);
            imagesavealpha($resized, true);
            $transparent = imagecolorallocatealpha($resized, 0, 0, 0, 127);
            imagefilledrectangle($resized, 0, 0, $newWidth, $newHeight, $transparent);

            imagecopyresampled(
                $resized,
                $image,
                0, 0, 0, 0,
                $newWidth, $newHeight,
                $origWidth, $origHeight
            );

            imagedestroy($image);
            $image = $resized;
        }

        // 7. تحويل إلى WebP
        imagealphablending($image, true);
        imagesavealpha($image, true);

        ob_start();
        imagewebp($image, null, $quality);
        $webpContent = ob_get_clean();
        imagedestroy($image);

        // 8. الحفظ
        Storage::disk('public')->put($relativePath, $webpContent);

        return [
            'file_path' => $relativePath,
            'mime_type' => 'image/webp',
            'file_size' => strlen($webpContent),
            'width'     => $newWidth,
            'height'    => $newHeight,
        ];
    }

    /**
     * حساب الأبعاد الجديدة مع الحفاظ على النسبة.
     *
     * @return array{0: int, 1: int}
     */
    private static function calculateDimensions(
        int $width,
        int $height,
        int $maxWidth,
        int $maxHeight
    ): array {
        // لو الصورة أصغر من الحد الأقصى، سيبه زي ما هي
        if ($width <= $maxWidth && $height <= $maxHeight) {
            return [$width, $height];
        }

        $ratio = $width / $height;

        if ($width > $height) {
            // أفقية
            $newWidth  = $maxWidth;
            $newHeight = (int) round($maxWidth / $ratio);
        } else {
            // عمودية أو مربعة
            $newHeight = $maxHeight;
            $newWidth  = (int) round($maxHeight * $ratio);
        }

        return [$newWidth, $newHeight];
    }
}
