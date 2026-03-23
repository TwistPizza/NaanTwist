<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Store;
use App\Models\OurDeal;
use App\Models\City;
use App\Models\State;
use App\Models\Banner;
use App\Models\Seo;
use App\Models\ExclusiveDealsStoreUser;
class StoreController extends Controller
{
public function storelocation(Request $request)
{
    $banner = Banner::where('section', 'store-near-me')->latest()->first();
    $query = $request->input('search');

    $stores = Store::with([
            'city:id,name',
            'state:id,name'
        ])
        ->select('id','name','city_id','state_id','address')
        ->when($query, function ($q) use ($query) {
            $q->where(function($sub) use ($query) {
                $sub->where('name', 'like', "%{$query}%")
                    ->orWhereHas('city', function($c) use ($query){
                        $c->where('name', 'like', "%{$query}%");
                    })
                    ->orWhereHas('state', function($s) use ($query){
                        $s->where('name', 'like', "%{$query}%");
                    });
            });
        })
        ->orderBy('state_id')
        ->orderBy('city_id')
        ->get();

    if ($request->ajax()) {
        return view('store.partials.store-accordion', compact('stores'))->render();
    }

    return view('store.store-location', compact('stores','banner'));
}

    public function show($slug)
    {
        
       $value = str_replace('-', ' ', $slug);
        // Store deals
        $store = Store::with(['deals', 'schedules', 'gallery'])
                  ->where('name', $value)  // slug column should exist in DB
                  ->firstOrFail();

            $seo = Seo::where('page', 'store-detail')
                        ->first();
            $banner = Banner::where('section', 'store')->latest()->first();

             $seoData = [
                'title'       => $seo->title ?? $store->name . ' | Naan Restaurant',
                'description' => $seo->description ?? 'Naan Restaurant provides best Indian food with fresh ingredients and fast service.',
                'keywords'    => $seo->keywords ?? 'restaurant, naan restaurant, indian food',
            ];
        return view('store.show', compact('store', 'seoData', 'banner'));
    }
     public function store(Request $request)
    {
        $request->validate([
            'store_id' => 'required|exists:stores,id',
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|unique:exclusive_deals_store_user,email',
        ]);

        ExclusiveDealsStoreUser::create($request->all());

        return back()->with('success', 'Your details have been saved!');
    }
}