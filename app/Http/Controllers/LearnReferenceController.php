<?php

namespace App\Http\Controllers;

use App\Models\Technology;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;
use Illuminate\Support\Facades\Log;



class LearnReferenceController extends Controller
{

    /**
     * Show of main page review the technology.
     *
     * @return \Illuminate\View\View
     */
    public function show(Technology $technology): View
    {
        $start = microtime(true);

        $cacheKey = "technology.show.{$technology->slug}";
        $title = $technology->name;
        $technology = Cache::remember($cacheKey, 3600, function () use ($technology) {
            return Technology::with([
                'sections:id,title,slug,technology_id',
                'sections.concepts:id,title,slug,type,syntax,return_type,description,section_id',
            ])->find($technology->id);
        });

        $loadTime = round((microtime(true) - $start) * 1000, 2);

        logger()->info("Page load for [{$technology->slug}]: {$loadTime}ms");

        $pageTitle = $technology->name;
        $pageSubtitle = 'توثيق رسمي';
        $canonicalUrl = route('docs.show', $technology->slug);

        return view('docs.main', compact(
            'technology',
            'pageTitle',
            'pageSubtitle',
            'canonicalUrl',
            'title',
        ));
    }
}
