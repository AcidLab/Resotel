<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Equipment;
use View;
use Redirect;

class EquipmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $equipements = Equipment::all();
        $view = View::make('equipements.index');
        $view->equipements = $equipements ; 
        return $view;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $view = View::make('equipements.create');
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
        $equipement = new Equipment;
        $equipement->label = $request->input('label');
        $equipement->save();
        $request->session()->flash('success','Equipement ajouté avec succés ! ');
        return Redirect::to(route('equipements.index'));
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
    public function updateEquipement(Request $request, $id)
    {
        $equipement = Equipment::find($id);
        $equipement->label = $request->input('label');
        $equipement->save();
        $request->session()->flash('success','Equipement mis à jour avec succés!');
        return Redirect::to(route('equipements.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteEquipement(Request $request,$id)
    {
        $equipement = Equipment::find($id);
        $equipement->delete();
        $request->session()->flash('success','Equipement supprimé avec succés!');
        return Redirect::to(route('equipements.index'));
    }
}
