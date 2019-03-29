<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Place;
use View;
use Redirect;
use Session;

class PlacesController extends Controller
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
        $view = View::make('places.index');
        $places = Place::all();
        $view->places = $places;
        return $view;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $place = Place::find($id);
        $view=View::make('places.edit');
        $view->place = $place;
        return $view;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatePlace(Request $request, $id)
    {
        $place = Place::find($id);
        $place->title = $request->input('title');
        if($request->input('description')){
            $place->description = $request->input('description');
        }
        if($request->file('picture_path')){

            $file = $request->file('picture_path');
            $filename = $file->store(config('files.places_path'),'public');
            $place->picture_path = asset($filename);  
        }
        $place->save();
        $request->session()->flash('success','Place mise à jour avec succés ! ');
        return Redirect::to(route('places.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
