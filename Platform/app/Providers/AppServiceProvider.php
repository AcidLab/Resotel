<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;
use Auth;
use App\Models\Slider;
use App\Models\About;
use App\Models\Next;
use App\Models\Place;
use App\Models\Partner;
use App\Models\City;
use App\Http\Controllers\FrontEnd\SearchController;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $abouts = About::all();
        $nexts = Next::all();
        $places = Place::all();
        $sliders = Slider::all();
        $partners = Partner::all();
        $cities = City::all();

        $random = rand(0, count($sliders)-1);
        View::share('abouts',$abouts);
        View::share('nexts',$nexts);
        View::share('places',$places);
        View::share('sliders',$sliders);
        View::share('partners',$partners);
        View::share('random',$random);
        View::share('cities',$cities);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Http\Controllers\SearchlController',function($app){
            return new SearchController;
        });
    }
}
