<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Arrangement;
use View;
use Redirect;

class ArrangementsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $arrangements = Arrangement::orderBy('type','desc')->get();
        $view = View::make('arrangements.index');
        $view->arrangements = $arrangements ; 
        return $view ; 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $view = View::make('arrangements.create');
        return $view ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $arrangement = new Arrangement ;
        $arrangement->label = $request->input('label');
        $arrangement->name = $request->input('name');
        $arrangement->type = $request->input('type');
        $arrangement->save();
        $request->session()->flash('success','Arrangement ajouté avec succés ! ');
        return Redirect::to(route('arrangements.index'));
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
        $arrangement = Arrangement::find($id);
        $view = View::make('arrangements.edit');
        $view->arrangement = $arrangement ; 
        return $view ; 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateArrangement(Request $request, $id)
    {
        $arrangement = Arrangement::find($id);
        $arrangement->label = $request->input('label');
        $arrangement->name = $request->input('name');
        $arrangement->type = $request->input('type');
        $arrangement->save();
        $request->session()->flash('success','Arrangement mis à jour avec succés ! ');
        return Redirect::to(route('arrangements.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteArrangement(Request $request,$id)
    {
        $arrangement = Arrangement::find($id);
        $arrangement->delete();
        $request->session()->flash('success','Arrangement supprimé avec succés ! ');
        return Redirect::to(route('arrangements.index'));
    }
}
