<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\About;
use App\Models\Next;
use App\Models\Place;
use App\Models\Partner;
use App\Models\Contact;
use View;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $view = View::make('showcase.home');
        $abouts = About::all();
        $nexts = Next::all();
        $places = Place::all();
        $sliders = Slider::all();
        $partners = Partner::all();
        $view->abouts = $abouts;
        $view->nexts = $nexts;
        $view->places = $places;
        $view->sliders = $sliders;
        $view->partners = $partners;
        return $view;

    }

    public function sendMessage(Request $request){

        $contact = new Contact;
        $contact->name = $request->input('name');
        $contact->email = $request->input('email');
        $contact->phone = $request->input('phone');
        $contact->agency_name = $request->input('agency_name');
        $contact->message = $request->input('message');
        $contact->save();
        return Redirect::to(route('home')); 
        
    }
}
