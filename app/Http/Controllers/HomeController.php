<?php
namespace App\Http\Controllers;

use App\Models\OurDeal;
use App\Models\OurMenu;
use App\Models\Banner;
use App\Models\Seo;

class HomeController extends Controller
{
    public function home()
    {
        $deals = OurDeal::where('is_available', 1)
                         ->where('section', 'home')
                         ->get();

        $banner = Banner::where('section', 'home')->latest() ->first();  
        $menus = OurMenu::where('is_available', 1)->get();
            $seo = Seo::where('page', 'home')
                        ->first();
          $seoData = [
            'title'       => $seo?->title ? $seo->title . ' | Naan Restaurant' : 'Naan Restaurant',
            'description' => $seo?->description ?? 'Naan Restaurant provides best Indian food with fresh ingredients and fast service.',
            'keywords'    => $seo?->keywords ?? 'restaurant, naan restaurant, indian food',
        ];
        // Data ko view me bhejna
        return view('home.index', [
            'deals' => $deals,
            'menus' => $menus,
            'banner' => $banner,
            'seoData' => $seoData,
        ]);
    }

    public function about()
    {
        return view('frontend.about');
    }

    public function contact()
    {
        return view('frontend.contact');
    }
}