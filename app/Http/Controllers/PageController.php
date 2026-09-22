<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class PageController extends Controller
{

    /**
     * PageController
     *
     * This controller is responsible for all the static, public-facing pages
     * of the Whiscrashow platform, including:
     *
     * - Home page (with latest posts + site statistics)
     * - About page
     * - Privacy Policy page
     * - Terms of Service page
     * - Authenticated dashboard (restricted to super-admin & writer roles)
     *
     * @package App\Http\Controllers
     */



    public function home(): View
    {
        $latestPosts = \App\Models\Post::published()
            ->with('image')
            ->latest()
            ->take(6)
            ->get();

        $stats = [
            'posts'        => \App\Models\Post::published()->count(),
            'technologies' => \App\Models\Technology::count(),
            'sections'     => \App\Models\Section::count(),
            'concepts'     => \App\Models\Concept::count(),
        ];

        return view('welcome', compact('latestPosts', 'stats'));
    }

    public function dashboard(): View
    {
        $title = 'لوحة التحكم';

        return view('dashboard.dashboard', compact('title'));
    }
    public function about(): View
    {
        return view('contact-privacy.about', [
            'title' => 'من نحن',
        ]);
    }

    public function privacy(): View
    {
        return view('contact-privacy.privacy', [
            'title' => 'سياسة الخصوصية',
        ]);
    }

    public function terms(): View
    {
        return view('contact-privacy.terms', [
            'title' => 'شروط الاستخدام',
        ]);
    }
}
