<?php

namespace App\Http\Controllers;

use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use App\Models\Post;
use App\Models\Technology;



class SitemapController extends Controller
{
    public function index()
    {
        $sitemap = Sitemap::create()
            // الصفحات الثابتة الأساسية
            ->add(Url::create('/')->setPriority(1.0)->setChangeFrequency('daily'))
            ->add(Url::create('/blog')->setPriority(0.9)->setChangeFrequency('daily'))
            ->add(Url::create('/about')->setPriority(0.5)->setChangeFrequency('monthly'))
            ->add(Url::create('/contact')->setPriority(0.5)->setChangeFrequency('monthly'))
            ->add(Url::create('/privacy')->setPriority(0.3)->setChangeFrequency('yearly'))
            ->add(Url::create('/terms')->setPriority(0.3)->setChangeFrequency('yearly'));

        // إضافة المقالات المنشورة ديناميكياً من قاعدة البيانات
        Post::latest()->each(function (Post $post) use ($sitemap) {
            $sitemap->add(
                Url::create(route('blog.show', $post->slug))
                    ->setLastModificationDate($post->updated_at)
                    ->setChangeFrequency('weekly')
                    ->setPriority(0.8)
            );
        });



        // Technology::latest()->each(function (Technology $tech) use ($sitemap) {
        //     $sitemap->add(
        //         Url::create(route('docs.show', $tech->slug))
        //             ->setLastModificationDate($tech->updated_at)
        //             ->setChangeFrequency('weekly')
        //             ->setPriority(0.7)
        //     );
        // });
        // ملاحظة: تم استثناء التقنيات/التوثيق مؤقتاً لحد ما تخلص إظهار قسم التوثيق،
        // ولما تحب تضيفه بعدين هنرجعه بكل سهولة بنفس الطريقة.

        return $sitemap->toResponse(request());
    }
}
