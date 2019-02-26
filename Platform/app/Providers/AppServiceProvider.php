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

        $random = rand(0, count($sliders)-1);
        View::share('abouts',$abouts);
        View::share('nexts',$nexts);
        View::share('places',$places);
        View::share('sliders',$sliders);
        View::share('partners',$partners);
        View::share('random',$random);
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
