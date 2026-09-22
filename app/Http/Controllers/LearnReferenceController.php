<?php

namespace App\Http\Controllers;

use App\Models\Technology;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;
use Mews\Purifier\Facades\Purifier;


class LearnReferenceController extends Controller
{

    /**
     * Cache TTL (ساعة).
     */
    private const CACHE_TTL = 3600;

    /**
     *
     *
     * @param Technology $technology
     * @return View
     */
    public function show(Technology $technology): View
    {
        $cacheKey = "technology.show.{$technology->slug}";

        // ✅ جلب التقنية من الكاش (أو من الداتابيز لو مش موجودة)
        $technology = Cache::remember(
            $cacheKey,
            self::CACHE_TTL,
            function () use ($technology) {
                return Technology::with([
                    'sections' => fn($query) => $query->orderBy('id'),
                    'sections.concepts' => fn($query) => $query->orderBy('type')->orderBy('id'),
                ])->find($technology->id);
            }
        );

        // ✅ حماية من XSS: تنظيف المحتوى
        $this->sanitizeTechnologyContent($technology);

        $title        = $technology->name;
        $pageTitle    = $technology->name;
        $pageSubtitle = 'توثيق رسمي';
        $canonicalUrl = route('docs.show', $technology->slug);

        return view('docs.main', compact(
            'technology',
            'title',
            'pageTitle',
            'pageSubtitle',
            'canonicalUrl',
        ));
    }

    /**
     * تنظيف محتوى التقنية والأقسام والمفاهيم من XSS.
     *
     * @param Technology $technology
     * @return void
     */
    private function sanitizeTechnologyContent(Technology $technology): void
    {
        $technology->description = Purifier::clean($technology->description ?? '');

        $technology->sections->each(function ($section) {
            $section->description = Purifier::clean($section->description ?? '');

            $section->concepts->each(function ($concept) {
                $concept->description = Purifier::clean($concept->description ?? '');
                $concept->syntax      = Purifier::clean($concept->syntax ?? '');
            });
        });
    }
}
