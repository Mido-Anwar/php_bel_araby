<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\Post;
use App\Models\Technology;

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
        $latestPosts = Post::published()
            ->select('id', 'title', 'slug', 'created_at')
            ->with('image:id,mediable_id,mediable_type,file_path,alt_text')
            ->latest()
            ->take(6)
            ->get();

        return view('welcome', compact('latestPosts'));
    }

    public function dashboard(): View
    {
        $title = 'لوحة التحكم';

        return view('dashboard.dashboard', compact('title'));
    }
    public function about(): View
    {
        return view('public_pages.about', [
            'title' => 'من نحن',
        ]);
    }

    public function privacy(): View
    {
        return view('public_pages.privacy', [
            'title' => 'سياسة الخصوصية',
        ]);
    }

    public function terms(): View
    {
        return view('public_pages.terms', [
            'title' => 'شروط الاستخدام',
        ]);
    }
}
