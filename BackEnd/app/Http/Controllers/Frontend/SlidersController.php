<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Slider;
use View;
use Redirect;
use Session;

class SlidersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware(['admin','auth']);
    }


    
    public function index()
    {
        $sliders = Slider::all();
        $view = View::make('sliders.index');
        $view->sliders = $sliders;
        return $view;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $view = View::make('sliders.create');
        return $view;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $slider = new Slider;
        $slider->title = $request->input('title');
        if($request->input('description')){
            $slider->description = $request->input('description');
        }
        if($request->file('picture_path')){

            $file = $request->file('picture_path');
            $filename = $file->store(config('files.sliders_path'),'public');
            $slider->picture_path = asset($filename);  
        }
        $slider->save();
        $request->session()->flash('success','Eléménet ajouté avec succés ! ');
        return Redirect::to(route('sliders.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slider = Slider::find($id);
        $view = View::make('sliders.edit');
        $view->slider = $slider;
        return $view;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateSlider(Request $request, $id)
    {
        $slider =  Slider::find($id);
        $slider->title = $request->input('title');
        if($request->input('description')){
            $slider->description = $request->input('description');
        }
        if($request->file('picture_path')){

            $file = $request->file('picture_path');
            $filename = $file->store(config('files.sliders_path'),'public');
            $slider->picture_path = asset($filename);  
        }
        $slider->save();
        $request->session()->flash('success','Eléménet modifié avec succés ! ');
        return Redirect::to(route('sliders.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteSlider(Request $request , $id)
    {
        $slider = Slider::find($id);
        $slider->delete();
        $request->session()->flash('success','Eléménet supprimé avec succés ! ');
        return Redirect::to(route('sliders.index'));
    }
}
