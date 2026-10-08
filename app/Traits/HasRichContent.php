<?php

namespace App\Traits;

use Illuminate\Support\Str;
use League\CommonMark\CommonMarkConverter;

/**
 * @mixin \Illuminate\Database\Eloquent\Model
 */
trait HasRichContent
{
    /**
     * تحديد اسم حقل المحتوى تلقائياً أو من خلال الموديل.
     */
    protected function contentField(): string
    {
        if (property_exists($this, 'contentField')) {
            return $this->contentField;
        }

        $attributes = method_exists($this, 'getAttributes') ? $this->getAttributes() : [];

        foreach (['content', 'body', 'description', 'text'] as $field) {
            if (array_key_exists($field, $attributes)) {
                return $field;
            }
        }

        return 'content';
    }

    /**
     * تحويل Markdown → HTML.
     */
    protected function convertMarkdownToHtml(?string $content): string
    {
        if (! $content) {
            return '';
        }

        $converter = new CommonMarkConverter([
            'html_input' => 'allow',
            'allow_unsafe_links' => false,
        ]);

        return $converter->convert($content)->getContent();
    }

    /**
     * Accessor: parsed_content → HTML.
     */
    public function getParsedContentAttribute(): string
    {
        $field = $this->contentField();
        return $this->convertMarkdownToHtml($this->{$field} ?? '');
    }

    /**
     * Accessor: meta_description → وصف مختصر ونظيف (160 حرف).
     */
    public function getMetaDescriptionAttribute(): string
    {
        $cleanText = html_entity_decode(strip_tags($this->parsed_content), ENT_QUOTES | ENT_HTML5, 'UTF-8');
        return Str::limit(trim(preg_replace('/\s+/', ' ', $cleanText)), 160);
    }

    /**
     * Accessor: og_image → جلب رابط الصورة بذكاء لأي موديل.
     */
    public function getOgImageAttribute(): string
    {
        // 1. فحص العلاقة إذا تم تحميلها مسبقاً (Eager Loading)
        if ($this->relationLoaded('image')) {
            $imageRelation = $this->getRelation('image');
            if ($imageRelation) {
                if (isset($imageRelation->file_path)) {
                    return asset('storage/' . $imageRelation->file_path);
                }
                if (isset($imageRelation->url)) {
                    return $imageRelation->url;
                }
            }
        }

        // 2. فحص ما إذا كانت الصورة عبارة عن عمود نصي في جدول الموديل مباشرة
        $attributes = method_exists($this, 'getAttributes') ? $this->getAttributes() : [];
        if (array_key_exists('image', $attributes) && is_string($attributes['image']) && !empty($attributes['image'])) {
            $path = $attributes['image'];
            return Str::startsWith($path, ['http://', 'https://']) ? $path : asset('storage/' . $path);
        }

        // 3. محاولة جلب علاقة الـ image لو لم يتم تحميلها مسبقاً
        try {
            if (method_exists($this, 'image')) {
                $imageRelation = $this->image()->first();
                if ($imageRelation && isset($imageRelation->file_path)) {
                    return asset('storage/' . $imageRelation->file_path);
                }
            }
        } catch (\Exception $e) {
            // تجاهل الخطأ لو العلاقة غير موجودة بالموديل
        }

        // 4. الصورة الافتراضية العامة للمنصة
        return asset('images/og-default.jpg');
    }
}
