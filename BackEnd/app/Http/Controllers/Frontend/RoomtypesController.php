<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Roomtype;
use View;
use Redirect;

class RoomtypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roomtypes = Roomtype::all();
        $view = View::make('roomtypes.index');
        $view->roomtypes = $roomtypes ; 
        return $view ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $view = View::make('roomtypes.create'); 
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
        $roomtype = new Roomtype ; 
        $roomtype->name = $request->input('name');
        $roomtype->label = $request->input('label');
        $roomtype->save();
        $request->session()->flash('success','Type ajuté avec succés !');
        return Redirect::to(route('roomtypes.index'));
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateRoomtype(Request $request, $id)
    {
        $roomtype = Roomtype::find($id);
        $roomtype->label = $request->input('label');
        $roomtype->name = $request->input('name');
        $roomtype->save();
        $request->session()->flash('success','Type mis à jour avec succés ! ');
        return Redirect::to(route('roomtypes.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteRoomtype(Request $request,$id)
    {
        $roomtype = Roomtype::find($id);
        $roomtype->delete();
        $request->session()->flash('success','Type supprimé avec succés ! ');
        return Redirect::to(route('roomtypes.index'));
    }
}
