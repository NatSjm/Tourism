<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Country;
use App\Models\Hotel;
use App\Models\TourType;
use App\Models\Nutrition;
use App\Models\Category;


use Illuminate\Support\Facades\View;

use Jenssegers\Date\Date;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //View::share('slider', false);
        //
        Date::setlocale(config('app.locale'));

//        $countryNames = Country::pluck('name');
//        $hotels = Hotel::pluck('hotel_class');
//        $tourTypes = TourType::pluck('name');
//        $nutritionTypes = Nutrition::pluck('nutrition_type');
//        $categories = Category::pluck('name');
//
//        View::share([
//                     'countryNames' => $countryNames,
//                     'hotels'       => $hotels,
//                     'tourTypes'    =>$tourTypes,
//                     'nutritionTypes'=>$nutritionTypes,
//                     'categories' =>$categories,
//            ]);


    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
