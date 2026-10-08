<?php

namespace App\Http\Controllers;

use App\Models\Technology;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;
use Mews\Purifier\Facades\Purifier;

class LearnReferenceController extends Controller
{
    private const CACHE_TTL = 3600;

    /**
     * عرض صفحة التقنية بالتوثيق الخاص بها.
     *
     * @param string $technology (هنا سيحمل قيمة الـ slug القادمة من الراوتر مباشرة كنص)
     * @return View
     */
    public function show(string $technology): View
    {
        // استخدام قيمة $technology (التي تمثل الـ slug) في مفتاح الكاش
        $cacheKey = "technology.show.{$technology}";

        $technologyModel = Cache::remember(
            $cacheKey,
            self::CACHE_TTL,
            function () use ($technology) {
                // البحث بالـ slug النصي القادم من الراوتر
                $tech = Technology::where('slug', $technology)->with([
                    'sections' => fn($query) => $query->orderBy('id'),
                    'sections.concepts' => fn($query) => $query->orderBy('type')->orderBy('id'),
                ])->firstOrFail();

                // التنظيف يتم مرة واحدة فقط عند بناء الكاش
                $this->sanitizeTechnologyContent($tech);

                return $tech;
            }
        );

        $title        = $technologyModel->name;
        $pageTitle    = $technologyModel->name;
        $pageSubtitle = 'توثيق رسمي';
        $canonicalUrl = route('docs.show', $technology);

        // تمرير المتغير للـ View بالاسم الذي تحتاجه (مثلاً technology)
        return view('docs.main', [
            'technology'   => $technologyModel,
            'title'        => $title,
            'pageTitle'    => $pageTitle,
            'pageSubtitle' => $pageSubtitle,
            'canonicalUrl' => $canonicalUrl,
        ]);
    }

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
